<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfInstalled;
use App\Http\Requests\InstallRequest;
use App\Install\AdminAccount;
use App\Install\App;
use App\Install\Database;
use App\Install\Requirement;
use App\Install\Store;
use DotenvEditor;
use Exception;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;
use Jenssegers\Agent\Agent;

class InstallController extends Controller
{
    public function __construct()
    {
        $this->middleware(RedirectIfInstalled::class);
    }

    public function start()
    {
        return view('install.start');
    }

    /**
     * @param Requirement $requirement
     */
    public function preInstallation(Requirement $requirement)
    {
        return view('install.pre_installation', compact('requirement'));
    }

    /**
     * @param Requirement $requirement
     */
    public function getConfiguration(Requirement $requirement)
    {
        if (!$requirement->satisfied()) {
            return redirect('install/pre-installation');
        }

        return view('install.configuration', compact('requirement'));
    }

    /**
     * @param InstallRequest $request
     * @param Database $database
     * @param AdminAccount $admin
     * @param Store $store
     * @param App $app
     * @param Factory $cache
     */
    public function postConfiguration(
        InstallRequest $request,
        Database $database,
        AdminAccount $admin,
        Store $store,
        App $app,
        Factory $cache
    ) {
        set_time_limit(3000);
        $agent = new Agent();
        //get the purchase code and validate

        try {
            $response = Curl::to('https://www.stackcanyon.com/api/check-purchase')
                ->withData(array(
                    'purchase_code' => $request->db['purchase_code'],
                    'ip_one' => $request->ip(),
                    'ip_two' => $this->getIp(),
                    'email' => $request->admin['email'],
                    'store_name' => $request->store['storeName'],
                    'storeEmail' => $request->store['storeEmail'],
                    'device' => $agent->device(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ))->post();

            $check = json_decode($response);

            if (isset($check->error)) {
                return back()->withInput()->with('error', $check->error);
            }
            try {
                $database->setup($request->db);

            } catch (\PDOException $pe) {
                return back()->withInput()
                    ->with('error', $pe->getMessage());
            }

            $this->processData($response);
            $admin->setup($request->admin);
            $store->setup($request->store, $cache);
            $app->setup();
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with(['message' => $e->getMessage()]);
        }
        return redirect('install/complete');
    }

    public function complete()
    {
        if (config('app.installed')) {
            return redirect()->route('admin.dashboard');
        }

        DotenvEditor::setKey('APP_INSTALLED', 'true')->save();

        return view('install.complete');
    }

    /**
     * @return mixed
     */
    private function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }

    /**
     * @param $response
     */
    private function processData($response)
    {
        $response = json_decode($response);
        $data = $this->dec($response->data);
        $data = json_decode($data);

        $dbSet = [];
        foreach ($data as $s) {
            $dbSet[] = [
                'key' => $s->key,
                'value' => $s->value,
            ];
        }

        if (!empty($data)) {
            DB::table('settings')->insert($dbSet);
        }

    }

    /**
     * @param $data
     * @return mixed
     */
    private function dec($data)
    {
        $enc = 'AES-256-CBC';
        $sk = '1254874128001';
        $s_iv = 'cd125d87e995d621';
        $k = hash('sha256', $sk);
        $iv = substr(hash('sha256', $s_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($data), $enc, $k, 0, $iv);
        return $output;
    }
}

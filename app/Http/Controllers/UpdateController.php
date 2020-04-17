<?php

namespace App\Http\Controllers;

use App\Orderstatus;
use App\PaymentGateway;
use App\Setting;
use App\Translation;
use App\User;
use Artisan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Ixudra\Curl\Facades\Curl;
use Zipper;

class UpdateController extends Controller
{
    /**
     * @param Request $request
     */
    public function updateFoodomaa(Request $request)
    {
        /*Version Info */
        $versionFile = File::get(base_path('version.txt'));
        if ($versionFile) {
            $versionMsg = 'Current Version: ' . $versionFile;
        } else {
            $versionMsg = null;
        }

        return view('admin.updateFoodomaa', array(
            'versionMsg' => $versionMsg,
        ));
    }

    /**
     * @param Request $request
     */
    public function uploadUpdateZipFile(Request $request)
    {
        // dd($request->all());
        //take the zip file and save it inside the tmp folder
        $file = $request->file('file');

        try {
            $destinationPath = base_path('tmp');

            $originalFile = $file->getClientOriginalName();
            //moving file to /tmp folder for installation
            $file->move($destinationPath, $originalFile);
            $response = [
                'success' => true,
            ];
            return response()->json($response);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 401);
        }

    }

    /**
     * @param Request $request
     */
    public function updateFoodomaaNow()
    {
        //check if UPLOAD-THIS.zip file is present in /tmp folder
        try {
            $updateFile = base_path('tmp/UPLOAD-THIS.zip');
            $checkIfExists = File::get($updateFile);
            //if it is present then continue, else error message exception

            //take the zip and extract to base folder
            $zipper = new Zipper;
            $zipper = Zipper::make($updateFile);
            $zipper->extractTo(base_path());

            // TODO
            //after extraction, run the post install (fix-update-issues script)
            $this->fixUpdateIssues();
            // END TODO
            //redirect with success
            return redirect()->route('admin.updateFoodomaa')->with(['success' => 'Update Successful']);

        } catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $e) {
            //redirect with file not found
            return redirect()->route('admin.updateFoodomaa')->with(['message' => 'Update File Not Found']);

        }

    }

    private function fixUpdateIssues()
    {
        try {
            // ** MIGRATE ** //
            //first migrate the db if any new db are avaliable...
            Artisan::call('migrate', [
                '--force' => true,
            ]);
            // ** MIGRATE END ** //

            // ** SETTINGS ** //
            // get the latest settings json file from the server...
            $data = Curl::to('https://stackcanyon.com/products/foodoma/updates/settings.json')->get();
            $data = json_decode($data);

            $dbSet = [];
            foreach ($data as $s) {

                //check if the setting key already exists, if exists, do nothing..
                $settingAlreadyExists = Setting::where('key', $s->key)->first();

                //else create an array of settings which doesnt exists...
                if (!$settingAlreadyExists) {
                    $dbSet[] = [
                        'key' => $s->key,
                        'value' => $s->value,
                    ];
                }
            }
            //insert new settings keys into settings table.
            DB::table('settings')->insert($dbSet);
            // ** SETTINGS END ** //

            // ** PAYMENTGATEWAYS ** //
            // check if paystack is installed
            $hasPayStack = PaymentGateway::where('name', 'PayStack')->first();
            if (!$hasPayStack) {
                //if not, then install new payment gateway "PayStack"
                $payStackPaymentGateway = new PaymentGateway();
                $payStackPaymentGateway->name = 'PayStack';
                $payStackPaymentGateway->description = 'PayStack Payment Gateway';
                $payStackPaymentGateway->is_active = 0;
                $payStackPaymentGateway->save();
            }
            // check if razorpay is installed
            $hasPayStack = PaymentGateway::where('name', 'Razorpay')->first();
            if (!$hasPayStack) {
                //if not, then install new payment gateway "PayStack"
                $payStackPaymentGateway = new PaymentGateway();
                $payStackPaymentGateway->name = 'Razorpay';
                $payStackPaymentGateway->description = 'Razorpay Payment Gateway';
                $payStackPaymentGateway->is_active = 0;
                $payStackPaymentGateway->save();
            }
            // ** END PAYMENTGATEWAYS ** //

            // ** ORDERSTATUS ** //
            // check if ready status is inserted
            $hasReadyOrderStatus = Orderstatus::where('id', '7')->first();
            if (!$hasReadyOrderStatus) {
                //if not, then insert it.
                $orderStatus = new Orderstatus();
                $orderStatus->name = 'Ready For Pick Up';
                $orderStatus->save();
            }
            // ** END ORDERSTATUS ** //

            // ** CHANGEURL ** //
            $jsFiles = glob(base_path('static/js') . '/*');
            foreach ($jsFiles as $file) {
                //read the entire string
                $str = file_get_contents($file);
                $baseUrl = substr(url('/'), 0, strrpos(url('/'), '/'));
                //replace string
                $str = str_replace('http://127.0.0.1/swiggy-laravel-react', $baseUrl, $str);
                //write the entire string
                file_put_contents($file, $str);
            }
            // ** END CHANGEURL ** //

            /*For v1.5 -> Remove all addresses and chnage all user default_address_id to 0 */
            $hasOnePointFive = File::exists(storage_path('hasOnePointFive'));
            if (!$hasOnePointFive) {
                DB::table('addresses')->truncate();
                $allUsers = User::get();
                foreach ($allUsers as $user) {
                    $user->default_address_id = 0;
                    $user->save();
                }

                //create English Translation
                $translation = new Translation();
                $translation->language_name = 'English';
                $translation->data = file_get_contents(storage_path('language/english.json'));
                $translation->is_active = 1;
                $translation->is_default = 1;
                $translation->save();

                File::put(storage_path('hasOnePointFive'), '1');
            }
            /* END for v1.5*/

            /** CLEAR LARAVEL CACHES **/
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            /** END CLEAR LARAVEL CACHES **/

            return redirect()->back()->with(['success' => 'Operation Successful']);
        } catch (\Illuminate\Database\QueryException $qe) {
            return redirect()->back()->with(['message' => $qe->getMessage()]);
        } catch (Exception $e) {
            return redirect()->back()->with(['message' => $e->getMessage()]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => $th]);
        }

    }
}

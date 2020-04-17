<?php

namespace App\Http\Controllers;

use App\Module;
use App\Setting;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Zipper;

class ModuleController extends Controller
{

    public function modules()
    {
        $modules = Module::get();

        return view('admin.modules', array(
            'modules' => $modules,
        ));
    }

    /**
     * @param Request $request
     */
    public function uploadModuleZipFile(Request $request)
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
    public function installModule(Request $request, Factory $cache)
    {
        try {
            $moduleFile = base_path('tmp/UPLOAD-THIS-MODULE.zip');
            $checkIfExists = File::get($moduleFile);
            //if it is present then continue, else error message exception

            //take the zip and extract to base folder
            $zipper = new Zipper;
            $zipper = Zipper::make($moduleFile);

            $valid = false;
            foreach ($zipper->listFiles() as $key => $value) {
                if ($value === 'module-manifest.json') {
                    $valid = true;
                }
            }
            if ($valid) {
                //get the manifest file content to insert in db
                $manifest = $zipper->getFileContent('module-manifest.json');
                $manifest = json_decode($manifest);

                //check if the module is already installed
                $module = Module::where('name', $manifest->name)->first();

                if ($module) {
                    //module already exists, update the module version
                    $module->name = $manifest->name;
                    $module->description = $manifest->description;
                    $module->version = $manifest->version;
                    $module->update_date = date('Y-m-d H:i:s');
                    $module->save();
                } else {
                    //create new module entry
                    $mod = new Module();
                    $mod->name = $manifest->name;
                    $mod->description = $manifest->description;
                    $mod->version = $manifest->version;
                    $module->update_date = date('Y-m-d H:i:s');
                    $mod->save();
                }

                //extract to the root directory of the application (base path)
                $zipper->extractTo(base_path());

                //run module installation php file
                // process installation file
                $installationFile = base_path('module-install.php');
                include $installationFile;
                if (main()) {

                }
                // unlink($installationFile);
                File::delete($installationFile);

                $cache->forget('settings');

                return redirect()->route('admin.modules')->with(['success' => 'Module Uploaded Successfully']);
            } else {
                //rediect to modules route...
                return redirect()->route('admin.modules')->with(['message' => 'Not a Valid Module File']);
            }
        } catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $e) {
            //redirect with file not found
            return redirect()->route('admin.modules')->with(['message' => 'Module File Not Found']);

        }

    }

    /**
     * @param $id
     */
    public function enableModule($id)
    {
        $module = Module::where('id', $id)->first();

        if ($module) {
            try {
                //get all the files in static folder and change the module code to dis module code
                $jsFiles = glob(base_path('static/js') . '/*');
                foreach ($jsFiles as $file) {
                    $str = file_get_contents($file);
                    $en = $module->code;
                    $str = str_replace($module->code . 'dis', $en, $str);
                    file_put_contents($file, $str);
                }
                $module->toggleActive()->save();
                return redirect()->back()->with(['success' => $module->name . ' Enabled']);

            } catch (\Illuminate\Database\QueryException $qe) {
                return redirect()->back()->with(['message' => $qe->getMessage()]);
            } catch (Exception $e) {
                return redirect()->back()->with(['message' => $e->getMessage()]);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['message' => $th]);
            }
        } else {
            return redirect()->back()->with(['message', 'Something went wrong!!!']);
        }
    }

    /**
     * @param $id
     */
    public function disableModule($id)
    {
        $module = Module::where('id', $id)->first();

        if ($module) {
            try {
                //get all the files in static folder and change the module code to dis module code
                $jsFiles = glob(base_path('static/js') . '/*');
                foreach ($jsFiles as $file) {
                    $str = file_get_contents($file);
                    $dis = $module->code . 'dis';
                    $str = str_replace($module->code, $dis, $str);
                    file_put_contents($file, $str);
                }
                $module->toggleActive()->save();

                return redirect()->back()->with(['success' => $module->name . ' Disabled']);

            } catch (\Illuminate\Database\QueryException $qe) {
                return redirect()->back()->with(['message' => $qe->getMessage()]);
            } catch (Exception $e) {
                return redirect()->back()->with(['message' => $e->getMessage()]);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['message' => $th]);
            }

        } else {
            return redirect()->back()->with(['message', 'Something went wrong!!!']);
        }
    }

}

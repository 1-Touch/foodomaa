<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class InitController extends Controller
{
    public function init()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        return "Done";
    }
}

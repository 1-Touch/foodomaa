<?php

namespace App\Http\Controllers;

use App\Translation;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param Request $request
     */
    public function getAllLanguages(Request $request)
    {
        $languages = Translation::where('is_active', '1')->get(['id', 'language_name', 'is_default']);

        return response()->json($languages);
    }

    /**
     * @param Request $request
     */
    public function getSingleLanguage(Request $request)
    {
        $language = Translation::where('id', $request->id)->first();

        if ($language) {
            $data = $language->data;
            return response()->json(json_decode($data));
        }
    }
}

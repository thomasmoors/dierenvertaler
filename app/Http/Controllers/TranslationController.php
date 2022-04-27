<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslationRequest;
use App\Languages\Human;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function translate(TranslationRequest $translationRequest)
    {

    }

    public function detect(TranslationRequest $translationRequest)
    {

    }

    public function targetLanguages(Request $request)
    {
        switch ($request->from) {
            case 'mens':
                return (new Human())->targetLanguages();
            default:
                throw new \Exception('This language can\'t be translated');
        }
    }
}

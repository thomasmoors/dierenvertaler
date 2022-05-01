<?php

namespace App\Http\Controllers;

use App\Helpers\LanguageHelper;
use App\Http\Requests\TranslationRequest;
use App\Http\Responses\TranslationResponse;
use App\Languages\Human;
use App\Languages\Labrador;
use App\Languages\Parakeet;
use App\Languages\Parrot;
use App\Languages\Poodle;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function translate(TranslationRequest $translationRequest)
    {
        $input = $translationRequest->sourceText;

        switch ($translationRequest->to) {
            case 'Parkiet':
                $translation = (new Parakeet())->translate($input);
                break;
            case 'Poedel':
                $translation = (new Poodle())->translate($input);
                break;
            case 'Labrador':
                $translation = (new Labrador())->translate($input);
                break;
            case 'Papegaai':
                $translation = (new Parrot())->translate($input);
                break;
            default:
                throw new \Exception('This language can\'t be translated');
        }

        switch ($translationRequest->from) {
            case 'Mens':
                $from = Human::class;
                break;
            case 'Labrador':
                $from = Labrador::class;
                break;
            case 'Poedel':
                $from = Poodle::class;
                break;
            case 'Parkiet':
                $from = Parakeet::class;
                break;
        }

        return (new TranslationResponse($translation, $from, $translationRequest->languageDetected))->response();

    }

    public function targetLanguages(Request $request)
    {
        switch ($request->from) {
            case 'Mens':
                return LanguageHelper::LanguagesArrayToStringArray((new Human())->targetLanguages());
            case 'Labrador':
                return LanguageHelper::LanguagesArrayToStringArray((new Labrador())->targetLanguages());
            case 'Poedel':
                return LanguageHelper::LanguagesArrayToStringArray((new Poodle())->targetLanguages());
            case 'Parkiet':
                return LanguageHelper::LanguagesArrayToStringArray((new Parakeet())->targetLanguages());
            default:
                throw new \Exception('This language can\'t be translated');
        }
    }
}

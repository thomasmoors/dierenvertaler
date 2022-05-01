<?php

namespace App\Helpers;

use App\Interfaces\LanguageDetectionInterface;
use App\Languages\Labrador;
use App\Languages\Language;
use App\Languages\Parakeet;
use App\Languages\Parrot;
use App\Languages\Poodle;
use ReflectionClass;

class LanguageHelper
{
    public static function LanguagesArrayToStringArray(array $languages): array
    {
        return collect($languages)->map(function (string $language) {
            $class = new ReflectionClass($language);
            return $class->getStaticPropertyValue('name');
        })->toArray();
    }

    public static function DetectLanguage(string $input): string
    {
        $language = collect([new Labrador(), new Parakeet(), new Parrot(), new Poodle()])->first(function (LanguageDetectionInterface $language) use ($input) {
            return $language->detectLanguage($input);
        });

        if ($language !== null) {
            return $language::$name;
        }

        return 'Taal kon niet automatisch worden herkend';
    }

    public static function ClassStringToName(string $className): string
    {
        $class = new ReflectionClass($className);
        return $class->getStaticPropertyValue('name');
    }
}

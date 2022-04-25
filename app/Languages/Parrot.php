<?php

namespace App\Languages;

use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;

class Parrot implements TranslationInterface
{
    private const VOCABULARY = 'Ik praat je na, ';

    public function translate(string $input): string
    {
        return self::VOCABULARY . $input;
    }
}

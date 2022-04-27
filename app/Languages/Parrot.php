<?php

namespace App\Languages;

use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;

class Parrot extends Language implements TranslationInterface
{
    public string $name = 'Papegaai';

    private const VOCABULARY = 'Ik praat je na, ';

    /**
     * Iedere zin beginnen met ‘Ik praat je na, ’ en vervolgen met de originele tekst
     */
    public function translate(string $input): string
    {
        return self::VOCABULARY . $input;
    }
}

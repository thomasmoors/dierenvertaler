<?php

namespace App\Languages;

use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;

class Poodle implements TranslationInterface, LanguageDetectionInterface
{
    private const VOCABULARY = 'woefie';

    public function detectLanguage(string $input): bool
    {
        return collect(explode(' ', $input))->every(function ($word) {
            return $word === self::VOCABULARY;
        });
    }

    public function translate(string $input): string
    {
        return collect(explode(' ', $input))->map(function () {
            return self::VOCABULARY;
        })->implode(' ');
    }
}

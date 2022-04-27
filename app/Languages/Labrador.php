<?php

namespace App\Languages;

use App\Interfaces\CanBeTranslatedInterface;
use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;

class Labrador extends Language implements TranslationInterface, LanguageDetectionInterface, CanBeTranslatedInterface
{
    public string $name = 'Labrador';

    private const VOCABULARY = 'woef';

    public function detectLanguage(string $input): bool
    {
        return collect(explode(' ', $input))->every(function ($word) {
            return $word === self::VOCABULARY;
        });
    }

    /**
     * Ieder woord vervangen door woef
     */
    public function translate(string $input): string
    {
        return collect(explode(' ', $input))->map(function () {
            return self::VOCABULARY;
        })->implode(' ');
    }

    public function targetLanguages(): array
    {
        return [
          Poodle::class,
          Parrot::class,
        ];
    }
}

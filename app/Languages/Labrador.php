<?php

namespace App\Languages;

use App\Interfaces\CanBeTranslatedInterface;
use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;
use Illuminate\Support\Collection;

class Labrador extends Language implements TranslationInterface, LanguageDetectionInterface, CanBeTranslatedInterface
{
    public static string $name = 'Labrador';

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
        $split = $this->prepareText($input);

        return $split->map(function (Collection $sentence) {
            return $sentence->map(function () {
                return self::VOCABULARY;
            })->implode(' ');
        })->implode("\n");
    }

    public function targetLanguages(): array
    {
        return [
          Poodle::class,
          Parrot::class,
        ];
    }
}

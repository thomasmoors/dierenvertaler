<?php

namespace App\Languages;

use App\Interfaces\CanBeTranslatedInterface;
use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;
use Illuminate\Support\Collection;

class Parakeet extends Language implements TranslationInterface, LanguageDetectionInterface, CanBeTranslatedInterface
{
    public static string $name = 'Parkiet';

    private const CONSONANT_VOCABULARY = 'piep';
    private const VOWEL_VOCABULARY = 'tjilp';
    private const VOWELS = ['a', 'e', 'i', 'o', 'u'];

    public function detectLanguage(string $input): bool
    {
        return collect(explode(' ', $input))->every(function ($word) {
            return $word === self::CONSONANT_VOCABULARY || self::VOWEL_VOCABULARY;
        });
    }

    /**
     * Indien het woord begint met een klinker vervangen door tjilp, anders door piep
     */
    public function translate(string $input): string
    {
        $split = $this->prepareText($input);

        return $split->map(function (Collection $sentence) {
            return $sentence->map(function (string $word) {
                return in_array(substr($word, 0, 1), self::VOWELS) ? self::VOWEL_VOCABULARY : self::CONSONANT_VOCABULARY;
            })->implode(' ');
        })->implode("\n");
    }

    public function targetLanguages(): array
    {
        return [Parrot::class];
    }
}

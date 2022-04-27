<?php

namespace App\Languages;

use App\Interfaces\CanBeTranslatedInterface;
use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;

class Parakeet extends Language implements TranslationInterface, LanguageDetectionInterface, CanBeTranslatedInterface
{
    public string $name = 'Parkiet';

    private const CONSONANT_VOCABULARY = 'piep';
    private const VOWEL_VOCABULARY = 'tjilp';


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
        return collect(explode(' ', $input))->map(function ($word) {
            return in_array(substr($word, 0, 1), ['a', 'e', 'i', 'o', 'u']) ? self::VOWEL_VOCABULARY : self::CONSONANT_VOCABULARY;
        })->implode(' ');
    }

    public function targetLanguages(): array
    {
        return [Parrot::class];
    }
}

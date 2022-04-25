<?php

namespace App\Languages;

use App\Interfaces\LanguageDetectionInterface;
use App\Interfaces\TranslationInterface;

class Parakeet implements TranslationInterface, LanguageDetectionInterface
{
    private const CONSONANT_VOCABULARY = 'piep';
    private const VOWEL_VOCABULARY = 'tjilp';


    public function detectLanguage(string $input): bool
    {
        return collect(explode(' ', $input))->every(function ($word) {
            return $word === self::CONSONANT_VOCABULARY || self::VOWEL_VOCABULARY;
        });
    }

    public function translate(string $input): string
    {
        return collect(explode(' ', $input))->map(function ($word) {
            return in_array(substr($word, 0, 1), ['a', 'e', 'i', 'o', 'u']) ? self::VOWEL_VOCABULARY : self::CONSONANT_VOCABULARY;
        })->implode(' ');
    }
}

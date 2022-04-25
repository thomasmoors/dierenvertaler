<?php

namespace App\Languages;

use App\Interfaces\TranslationInterface;

class Drunk implements TranslationInterface
{
    private const VOCABULARY_SUFFIX = 'Burp!';
    private const VOCABULARY_MIDDLE = 'Proost!';

    public function translate(string $input): string
    {
        // TODO: Implement translate() method.
    }
}

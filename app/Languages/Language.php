<?php

namespace App\Languages;

use Illuminate\Support\Collection;

abstract class Language
{
    public static string $name;

    private function textToSentences(string $text): Collection
    {
        return collect(explode("\n", $text));
    }

    private function sentencesToWords(Collection $sentences): Collection
    {
        return $sentences->map(function (string $sentence) {
            return collect(explode(' ', $sentence));
        });
    }

    public function prepareText(string $text)
    {

        return $this->sentencesToWords($this->textToSentences($text));
    }
}

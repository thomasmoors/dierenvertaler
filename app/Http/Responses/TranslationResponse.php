<?php

namespace App\Http\Responses;

use App\Helpers\LanguageHelper;
use App\Languages\Language;

class TranslationResponse
{
    private string $translation;
    private string $from;
    private bool $detected;

    public function __construct(string $translation, string $from, bool $detected = false)
    {
        $this->from = $from;
        $this->translation = $translation;
        $this->detected = $detected;
    }

    public function response()
    {
        return [
            'translation' => $this->translation,
            'from' => LanguageHelper::ClassStringToName($this->from),
            'detected' => $this->detected,
        ];
    }
}

<?php

namespace App\Interfaces;

interface LanguageDetectionInterface
{
    public function detectLanguage(string $input): bool;
}

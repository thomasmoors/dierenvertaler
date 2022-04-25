<?php

namespace App\Interfaces;

interface TranslationInterface
{
    public function translate(string $input): string;
}

<?php

namespace App\Interfaces;

interface CanBeTranslatedInterface
{
    public function targetLanguages(): array;
}

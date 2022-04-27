<?php

namespace App\Languages;

use App\Interfaces\CanBeTranslatedInterface;

class Human extends Language implements CanBeTranslatedInterface
{
    public string $name = 'Mens';

    public function targetLanguages(): array
    {
        return [
            Labrador::class,
            Poodle::class,
            Parakeet::class,
            Parrot::class,
        ];
    }
}

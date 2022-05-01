<?php

namespace App\Languages;

use App\Interfaces\TranslationInterface;

class Drunk extends Language implements TranslationInterface
{
    public static string $name = 'Dronken';

    private const VOCABULARY_SUFFIX = 'Burp!';
    private const VOCABULARY_MIDDLE = 'Proost!';

    private string $sentence;

    public function translate(string $input): string
    {
        $split = $this->prepareText($input);
        $this->sentence = $input;

        return $this->nthWordBackward(4)->addMiddle()->addSuffix()->sentence;
    }

    /**
     * De vertaling eindigt op ‘ Burp!’
     */
    private function addSuffix(): self
    {
        $this->sentence .= self::VOCABULARY_SUFFIX;

        return  $this;
    }

    /**
     * Tussen de twee zinnen in het midden van de vertaling komt ‘Proost!’
     */
    private function addMiddle(): self
    {
        $sentences = explode("\n", $this->sentence);

        if (count($sentences) !== 2) {
            throw new \Exception('There should be 2 sentences');
        }

        $this->sentence = implode('\n', array_splice($sentences, 2, 0, self::VOCABULARY_MIDDLE));

        return $this;
    }

    /**
     * Elk vierde woord wordt achterstevoren geschreven
     */
    private function nthWordBackward(int $backwardPosition) : self
    {
        $this->sentence = collect(explode(' ', $this->sentence))->map(function ($word, $index) use ($backwardPosition) {
            if ($index % $backwardPosition) {
                return strrev($word);
            }

            return $word;
        });

        return $this;
    }
}

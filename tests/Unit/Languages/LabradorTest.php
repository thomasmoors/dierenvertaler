<?php

namespace Languages;

use App\Languages\Labrador;
use PHPUnit\Framework\TestCase;

class LabradorTest extends TestCase
{

    public function testTranslate()
    {
        $text = "One two\nthree four";
        $translated = (new Labrador())->translate($text);
        $expected = "woef woef\nwoef woef";

        var_dump($translated);

        $this->assertEquals($translated, $expected);
    }
}

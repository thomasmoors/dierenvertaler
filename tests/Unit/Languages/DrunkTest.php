<?php

namespace Languages;

use App\Languages\Drunk;
use PHPUnit\Framework\TestCase;

class DrunkTest extends TestCase
{

    public function testTranslate()
    {
        $drunk = new Drunk();

        $sentence  = 'Ik ben dronken door te veel biertjes \n Hopelijk merk je er niet te veel van';

        $translation = $drunk->translate($sentence);

        $expected = 'Ik ben dronken rood te veel biertjes \n Hopelijk merk je er niet te veel van';

        $this->assertEquals($translation, $expected);
    }
}

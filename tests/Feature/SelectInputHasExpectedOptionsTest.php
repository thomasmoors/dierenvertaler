<?php

use function Pest\Laravel\get;

it('has select input has expected options', function () {
    $response = get('/')->assertSee(['Mens', 'Labrador', 'Poedel', 'Parkiet']);
});

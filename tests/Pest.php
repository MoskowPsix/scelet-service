<?php

use Mockery\MockInterface;
use Tests\TestCase;
use function Pest\Laravel\mock;

uses(TestCase::class)->in('Feature');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});
function mockAction(string $class, mixed $returnValue = null): MockInterface
{
    return mock($class)->allows(['execute' => $returnValue]);
}


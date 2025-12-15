<?php


use function Pest\Laravel\getJson;

uses(\Tests\ComponentTestCase::class)->group('component', 'users');

test('GET /api/v1/posts/posts/{id} 200', function () {
    getJson("/api/v1/users/users");
});

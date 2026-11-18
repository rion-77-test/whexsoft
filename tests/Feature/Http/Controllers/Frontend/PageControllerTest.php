<?php

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

it('renders every public informational page', function () {
    foreach (['about', 'process', 'faq', 'privacy', 'terms'] as $routeName) {
        $this->get(route($routeName))
            ->assertOk();
    }
});

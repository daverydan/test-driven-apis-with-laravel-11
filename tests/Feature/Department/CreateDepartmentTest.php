<?php

use App\Models\Department;

use function Pest\Laravel\postJson;

it('creates a department', function () {
    $department = postJson(route('departments.store'), [
        'name' => 'Development',
        'description' => 'Awesome developers across the board',
    ]);

    expect($department)
        ->attributes->name->toBe('Development')
        ->attributes->description->toBe('Awesome developers across the board');
})->group('department');

it('validates name property', function (?string $name) {
    Department::factory([
        'name' => 'Development',
    ])->create();

    postJson(route('departments.store'), [
        'name' => $name,
        // 'description' => 'description',
    ])->assertInvalid(['name']);
})
    ->with(['', null, 'Development'])
    ->group('department');

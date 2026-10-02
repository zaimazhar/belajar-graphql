<?php

use App\Models\Service;
use App\Models\User;

test('view profile returns the user with their services', function () {
    $user = User::factory()->create(['name' => 'Jane Doe']);
    Service::create([
        'user_id' => $user->id,
        'expertise_field' => 'Plumbing',
        'year_of_experience' => 5,
    ]);

    $response = $this->postJson('/graphql', [
        'query' => 'query ($id: ID!) { viewProfile(id: $id) { name services { expertise_field year_of_experience } } }',
        'variables' => ['id' => $user->id],
    ]);

    $response->assertOk()
        ->assertJsonMissingPath('errors')
        ->assertExactJson([
            'data' => [
                'viewProfile' => [
                    'name' => 'Jane Doe',
                    'services' => [
                        ['expertise_field' => 'Plumbing', 'year_of_experience' => 5],
                    ],
                ],
            ],
        ]);
});

test('view profile returns null for an unknown user', function () {
    $this->postJson('/graphql', [
        'query' => '{ viewProfile(id: 999) { name } }',
    ])->assertOk()->assertExactJson(['data' => ['viewProfile' => null]]);
});

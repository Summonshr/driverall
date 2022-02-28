<?php

use App\Models\User;

it('store resource', function () {
    $this->seed();

    $response = $this->post('/api/v1/login', [
        'email' => 'summonshr@gmail.com',
        'password' => 'password',
        'device_name' => 'first_test'
    ], ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertSee('token');

    $token =  $response->getData()->data->token;

    $header = [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ];

    $this->post('/api/v1/resource', ['type' => 'tippp'], $header)
        ->assertStatus(422);

    $this->post('/api/v1/resource', ['type' => 'trip'], $header)
        ->assertSee('The office id field is required.');

    $this->post('/api/v1/resource', ['type' => 'trip', 'name' => 'Office Name', 'description' => 'Office description', 'office_id' => '99'], $header)
        ->assertSee('The selected office id is invalid.');

    $office = $this->post('/api/v1/resource', ['type' => 'office', 'name' => 'Office Name', 'description' => 'Office description'], $header)
        ->assertStatus(201)->getData()->data;

    $this->post('/api/v1/resource', ['type' => 'trip', 'name' => 'Trip Name', 'description' => 'Trip description', 'office_id' => User::find(1)->offices()->first()->id], $header)
        ->assertStatus(201);

    $this->put('/api/v1/resource/' . $office->id, ['type' => 'office', 'name' => 'Office Name Modified', 'description' => 'Office description modified', 'add_tags' => ['Tag 3', 'Tag 4', 'Tag 5'], 'remove_tags' => ['Tag 1', 'Tag 2']], $header)
        ->assertStatus(200);
});

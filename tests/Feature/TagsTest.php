<?php

test('resource can have tags', function () {
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

    $office = $this->post('/api/v1/resource', ['type' => 'office', 'name' => 'Office Name', 'description' => 'Office description'], $header)
        ->assertStatus(201)->getData();

    $office = $this->post('/api/v1/resource', ['type' => 'office', 'name' => 'Office Name', 'description' => 'Office description', 'tags' => ['Tag 1', 'Tag 2']], $header)
        ->assertStatus(201)->getData()->data;

    $this->get('/api/v1/resource/' . $office->id . '/tags?type=office', $header)
        ->assertStatus(200)
        ->assertSee('Tag 1')
        ->assertSee('Tag 2');

    $this->put('/api/v1/resource/' . $office->id, ['type' => 'office', 'name' => 'Office Name Modified', 'description' => 'Office description modified', 'add_tags' => ['Tag 3', 'Tag 4', 'Tag 5'], 'remove_tags' => ['Tag 1', 'Tag 2']], $header)
        ->assertStatus(200);

    $this->get('/api/v1/resource/' . $office->id . '/tags?type=office', $header)
        ->assertStatus(200)
        ->assertDontSee('Tag 1')
        ->assertDontSee('Tag 2')
        ->assertSee('Tag 3')
        ->assertSee('Tag 4')
        ->assertSee('Tag 5');
});

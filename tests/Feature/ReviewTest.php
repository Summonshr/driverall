<?php

test('resource should be reviewed', function () {
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
        ->assertStatus(201)->getData()->data;
        
    $trip = $this->post('/api/v1/resource', ['type' => 'trip', 'name' => 'Trip Name', 'office_id' => $office->id,  'description' => 'Trip description'], $header)
        ->assertStatus(201)->getData()->data;

    $this->post('/api/v1/resource/' . $office->id . '/review', ['type' => 'trip'], $header)
        ->assertStatus(422)
        ->assertSee('The review field is required')
        ->assertSee('The name field is required')
        ->assertSee('The rating field is required');

    $this->post('/api/v1/resource/' . $trip->id . '/review', ['type' => 'trip', 'email' => 'summonshr@gmail.com', 'name' => 'Suman Shrestha', 'phone_number' => '9841145614', 'review' => 'This is superb review', 'rating' => 5], $header)
        ->assertStatus(201)
        ->assertSee('*****')
        ->assertSee('reviewed');

    $this->get('/api/v1/resource/' . $trip->id . '/review?type=trip', $header)
        ->assertStatus(200)
        ->assertSee('This is superb review');

    $this->post('/api/v1/resource/' . $trip->id . '/review', ['type' => 'trip', 'email' => 'summonshr@gmail.com', 'name' => 'Suman Shrestha', 'phone_number' => '9841145614', 'review' => 'This is superb review', 'rating' => 5], $header)
        ->assertStatus(409)
        ->assertSee('Review already exists');

    $this->post('/api/v1/resource/' . $trip->id . '/review', ['type' => 'trip', 'email' => 'summon.shr@gmail.com', 'name' => 'Suman Shrestha', 'phone_number' => '9841345614', 'review' => 'This is another superb review', 'rating' => 3], $header)
        ->assertStatus(201)
        ->assertSee('*****')
        ->assertSee('reviewed');

    $this->post('/api/v1/resource/' . $trip->id . '/review', ['type' => 'trip', 'email' => 'summonshr@gmail.com', 'name' => 'Suman Shrestha', 'phone_number' => '9841145614', 'review' => 'This is superb review', 'rating' => 5], $header)
        ->assertStatus(409)
        ->assertSee('Review already exists');

    $this->get('/api/v1/resource/' . $trip->id . '/review?type=trip', $header)
        ->assertStatus(200)
        ->assertSee('This is another superb review')
        ->assertSee('4');
});

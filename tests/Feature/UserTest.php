<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

test('website is accessible')->get('/')->assertStatus(200);

it('should create a new user', function () {
    $this->seed();

    $email = 'summonsh.r@gmail.com';

    $this->post('/api/v1/sign-up', [
        'email' => $email,
        'password' => 'password'
    ])->assertStatus(201)->assertSee($email);

    $this->assertDatabaseHas('users', ['email' => $email]);
});

it('should not create new user', function () {
    $this->seed();

    $this->post('api/v1/sign-up', [], ['Accept' => 'application/json'])->assertStatus(422)
        ->assertSee('The email field is required when phone number is not present')
        ->assertSee('The phone number field is required when email is not present');

    $this->post('/api/v1/sign-up', [
        'email' => 'summonshr@gmail.com',
        'password' => 'password'
    ], ['Accept' => 'application/json'])->assertStatus(422)->assertSee('The email has already been taken.');
});

it('gets user details', function () {

    $this->seed();

    $this->get('/api/v1/user', ['Accept' => 'application/json'])->assertStatus(401);

    $this->post('/api/v1/login', [
        'email' => 'summons.hr@gmail.com',
        'password' => 'password',
        'device_name' => 'first_test'
    ], ['Accept' => 'application/json'])->assertStatus(403);

    $response = $this->post('/api/v1/login', [
        'email' => 'summonshr@gmail.com',
        'password' => 'password',
        'device_name' => 'first_test'
    ], ['Accept' => 'application/json'])->assertStatus(200)->assertSee('token');

    $this->get('/api/v1/user', [
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $response->getData()->data->token
    ])->assertStatus(200)->assertSee('summonshr@gmail.com');
});


test('otp is working correctly', function () {
    $this->seed();

    $this->post('api/v1/login-using-otp', [
        'email' => 'summon.shr@gmail.com'
    ], ['Accept' => 'application/json'])->assertStatus(403)->assertSee('This action is unauthorized');

    $this->post('api/v1/login-using-otp', [
        'email' => 'summonshr@gmail.com'
    ], ['Accept' => 'application/json'])->assertStatus(200)->assertSee('OTP has been sent');
    $user = User::where('email', 'summonshr@gmail.com')->first();
    $this->assertDatabaseHas('o_t_p_s', ['user_id' => $user->id]);

    $this->assertDatabaseCount('o_t_p_s',  1);

    $this->assertDatabaseHas('activity_log', ['causer_id' => $user->id]);

    $this->post('api/v1/login', [
        'email' => 'summonshr@gmail.com',
        'otp' => '1234'
    ], [
        'Accept' => 'application/json'
    ])->assertStatus(500)->assertSee('Failed to validate OTP');

    $otp = DB::table('o_t_p_s')->first();

    $this->post('api/v1/login', [
        'email' => 'summonshr@gmail.com',
        'otp' => $otp->otp
    ], [
        'Accept' => 'application/json'
    ])->assertStatus(200);

    $this->assertSoftDeleted('o_t_p_s', ['id' => 1]);
});

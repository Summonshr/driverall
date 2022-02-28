<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class InitialDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'email' => 'summonshr@gmail.com',
            'name'=>'Suman Shrestha',
            'phone_number'=>'9841145614',
            'password' => 'password'
        ]];

        collect($data)->each(function ($userData) {
            $user = new User();
            $user->forceFill($userData);
            $user->save();
        });
    }
}

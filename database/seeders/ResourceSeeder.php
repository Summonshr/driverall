<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;
use App\Models\User;
class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->hasOffices(3)->hasMembers(3)->create()->each(function($user){
            $user->offices->each(function($office) use($user) {
                $office->trips()->createMany(Trip::factory()->count(5)->make(['user_id'=>$user->id])->each->makeVisible(['user_id'])->toArray());
            });
        });
    }
}

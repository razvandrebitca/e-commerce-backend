<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Adrian',
            'email' => 'adrian@mail.com',
            'password'=>'$2y$10$x6FI63lwvcnqeVjY00X9tevatbCGzu0s5o4PKCrvcA.u2q9zROE62'
        ]);
    }
}

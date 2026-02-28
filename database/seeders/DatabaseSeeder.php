<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => Carbon::now(),
                'password' => '12345678',
            ]);
         User::factory(100)->create();




    }
}

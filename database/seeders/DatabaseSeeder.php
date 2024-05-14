<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([ParticipanteSeeder::class]);
       // User::factory(1)->create();

        User::factory()->create([
             'name' => 'Test User',
             'email' => 'admin@ccbol24.com',
             'rol'=>'admin'
         ]);
    }
}

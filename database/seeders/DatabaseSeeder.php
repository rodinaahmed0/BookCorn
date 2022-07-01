<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            CinemaSeeder::class,
            CategorySeeder::class,
            MovieSeeder::class,
            HallSeeder::class,
            TimeSeeder::class,
            ShowSeeder::class,
            RolesAndPermissionSeeder::class,

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::insert(
           [
               [
                'name' => "Rodina",
                'phone' => "01000000000",
                'email' => "rodina@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
               [
                'name' => "Tolba",
                'phone' => "01000000000",
                'email' => "tolba@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
               [
                'name' => "Yasmin",
                'phone' => "01000000000",
                'email' => "yasmin@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
               [
                'name' => "Demiana",
                'phone' => "01000000000",
                'email' => "demiana@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
               [
                'name' => "Ahmed",
                'phone' => "01000000000",
                'email' => "ahmed@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
               [
                'name' => "Yara",
                'phone' => "01000000000",
                'email' => "yara@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
               [
                'name' => "Mai",
                'phone' => "01000000000",
                'email' => "mai@bookcorn.com",
                'email_verified_at' => now(),
                'password' => Hash::make("123456"), // password
                'remember_token' => Str::random(10),
                'points' => 0,
                'wallet' => 0,

               ],
           ]
       );
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Admin",
            "username" => "admin",
            "role" => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin123"),
            "id_subbagian" => "1",
            "notelp" => "08123456789",
            "alamat" => "Jl. Kebon Jeruk No. 1"
        ]);
        User::create([
            "nama" => "User 1",
            "username" => "user1",
            "role" => "user",
            "email" => "user1@gmail.com",
            "password" => bcrypt("user123"),
            "id_subbagian" => "1",
            "notelp" => "08123456789",
            "alamat" => "Jl. Kebon Jeruk No. 1"
        ]);
        User::create([
            "nama" => "User 2",
            "username" => "user2",
            "role" => "user",
            "email" => "user2@gmail.com",
            "password" => bcrypt("user123"),
            "id_subbagian" => "1",
            "notelp" => "08123456789",
            "alamat" => "Jl. Kebon Jeruk No. 1"
        ]);
    }
}

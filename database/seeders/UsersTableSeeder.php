<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "id"    =>"1",
            "firstName"    =>"Admin",
            "lastName"    =>"123",
            "userName"    =>"admin123@gmail.com",
            "password"    =>bcrypt('123456'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
          [
            "name"=> "admin",
            "email"=> "admin@mail.com",
            "password"=> bcrypt("admin"),
            "role"=> 1
          ],
          [
            "name"=> "hajir",
            "email"=> "hajir@mail.com",
            "password"=> bcrypt("hajir"),
            "role"=> 2
          ]
        ];
        foreach ($datas as $key => $data) {
            User::create($data);
        };
    }
}

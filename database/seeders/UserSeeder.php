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
            "email"=> "smknega@gmail.com",
            "deletable"=>false,
            "password"=> bcrypt(env(("PASS_SEED"))),
            "role"=> 1
          ],
          [
            "name"=> "usammuhajir",
            "email"=> "usammuhajir047@gmail.com",
            "password"=> bcrypt(env(("PASS_SEED"))),
            "role"=> 1
          ]
        ];
        foreach ($datas as $key => $data) {
            User::create($data);
        };
    }
}

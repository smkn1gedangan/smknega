<?php

namespace Database\Seeders\Profil;

use App\Models\Profil\Waka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Wakaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Waka::factory(11)->create();
    }
}

<?php

namespace Database\Seeders\Profil;

use App\Models\Profil\Komite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komite::factory(8)->create();
    }
}

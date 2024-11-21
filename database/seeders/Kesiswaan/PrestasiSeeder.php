<?php

namespace Database\Seeders\Kesiswaan;

use App\Models\Kesiswaan\Prestasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::factory(15)->create();
    }
}

<?php

namespace Database\Seeders\Kesiswaan;

use App\Models\Kesiswaan\EkstraPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkstraPhotoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>'']
        ];
        foreach ($data as $d) {
          EkstraPhoto::create($d);
        }
    }
}

<?php

namespace Database\Seeders\Kesiswaan;

use App\Models\Kesiswaan\OsisPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OsisPhotoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [["nama"=>"michael","jabatan"=>"Ketua","photo"=>""],["nama"=>"Jhon Smith","jabatan"=>"Wakil Ketua","photo"=>""],["nama"=>"Erich","jabatan"=>"Sekretaris","photo"=>""],["nama"=>"Braum","jabatan"=>"Bendahara","photo"=>""]];

        foreach ($data as $d) {
            OsisPhoto::create($d);
        }

    }
}

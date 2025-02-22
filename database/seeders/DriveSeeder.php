<?php

namespace Database\Seeders;

use App\Models\Drive;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ["judul"=>"Hut Smkn nega","link"=>"https://smkn1gedangan.sch.id"],
            ["judul"=>"Hut Smkn nega2","link"=>"https://smkn1gedangan.sch.id"],
            ["judul"=>"Hut Smkn nega3","link"=>"https://smkn1gedangan.sch.id"],
        ];
        foreach ($datas as $data) {
            Drive::create($data);
        }
    }
}

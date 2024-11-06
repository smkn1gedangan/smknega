<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            "Berita","Olahraga","Hiburan","Prestasi","Teknologi","Budaya"
        ];
        foreach ($datas as $data) {
            Kategori::create(["nama"=>$data]);
        }
    }
}

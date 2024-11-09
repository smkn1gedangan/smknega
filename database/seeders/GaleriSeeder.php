<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas =[
            ["judul"=>"Potret Momen Bersejarah di Dunia Olahraga"
        ,"photo"=>"1730959744_372b3c5644e1740c9ba92bf5422d5cc7.jpg"],
            ["judul"=>"Aksi Terbaik di Kejuaraan Nasional 2024","photo"=>"1730959744_372b3c5644e1740c9ba92bf5422d5cc7.jpg"],
            ["judul"=>"Sorotan Atlet Terbaik di Olimpiade Terbaru","photo"=>"1730959744_372b3c5644e1740c9ba92bf5422d5cc7.jpg"],
            ["judul"=>"Galeri: Pertandingan Sepak Bola Terseru Tahun Ini","photo"=>"1730959744_372b3c5644e1740c9ba92bf5422d5cc7.jpg"],
            ["judul"=>"Detik-Detik Menegangkan di Arena Basket Dunia","photo"=>"1730959744_372b3c5644e1740c9ba92bf5422d5cc7.jpg"],
        ];
        foreach ($datas as $data) {
            Galeri::create($data);
        }
    }
}

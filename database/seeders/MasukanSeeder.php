<?php

namespace Database\Seeders;

use App\Models\Masukan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
            "nama"=>"Usammuhajir",
            "email"=>"usammuhajir@gmail.com",
            "masukan"=>"Menggunakan Caching: Implementasikan caching untuk menyimpan halaman atau elemen yang sering diakses, sehingga server tidak perlu memuat ulang data yang sama setiap kali. Caching dapat mempercepat waktu pemuatan halaman dan meningkatkan pengalaman pengguna."
            ],
            [
            "nama"=>"Ucup Surucup",
            "email"=>"ucupSurucup@gmail.com",
            "masukan"=>"Kompresi Gambar dan File: Pastikan semua gambar dioptimalkan untuk web, dengan ukuran file yang minimal tanpa mengurangi kualitas secara signifikan. Selain itu, kompres file CSS dan JavaScript agar lebih ringan saat diunduh oleh browser pengguna.."
            ],
        ];
        foreach ($data as $d) {
            Masukan::create($d);
        }
    }
}

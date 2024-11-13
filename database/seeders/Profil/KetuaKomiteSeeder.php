<?php

namespace Database\Seeders\Profil;

use App\Models\Profil\KetuaKomite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KetuaKomiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            "nama"=>"Usam muhajir Spd.Msi",
            "jabatan"=> "Lorem ipsum",
            "photo"=> "",
        ];
        KetuaKomite::create($data);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profil\DeskripsiKomite;
use Database\Seeders\Profil\DeskripsiKomiteSeeder;
use Database\Seeders\Profil\KetuaKomiteSeeder;
use Database\Seeders\Profil\KomiteSeeder;
use Database\Seeders\Profil\LogoSeeder;
use Database\Seeders\Profil\PotensiSeeder;
use Database\Seeders\Profil\RencanaSeeder;
use Database\Seeders\Profil\SejarahSeeder;
use Database\Seeders\Profil\StrukturSeed;
use Database\Seeders\Profil\VisiMisiSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $this->call([UserSeeder::class,kepsekSeeder::class,KategoriSeeder::class,GuruSeeder::class,ArticleSeeder::class,GaleriSeeder::class,ProfilSeeder::class,MasukanSeeder::class,SejarahSeeder::class,PotensiSeeder::class,RencanaSeeder::class,VisiMisiSeeder::class,LogoSeeder::class,DeskripsiKomiteSeeder::class,KomiteSeeder::class,KetuaKomiteSeeder::class,StrukturSeed::class]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Jurusan\AkuntansiSeeder;
use Database\Seeders\Jurusan\AnimasiSeeder;
use Database\Seeders\Jurusan\BogaSeeder;
use Database\Seeders\Jurusan\BusanaSeeder;
use Database\Seeders\Jurusan\DkvSeeder;
use Database\Seeders\Jurusan\SijaSeeder;
use Database\Seeders\Jurusan\TkrSeeder;
use Database\Seeders\Kesiswaan\BeasiswaSeeder;
use Database\Seeders\Kesiswaan\EkstrakulikulerSeeder;
use Database\Seeders\Kesiswaan\EkstraPhotoSeed;
use Database\Seeders\Kesiswaan\OsisPhotoSeed;
use Database\Seeders\Kesiswaan\OsisSeeder;
use Database\Seeders\Kesiswaan\PemetaanSeeder;
use Database\Seeders\Kesiswaan\PrestasiSeeder;
use Database\Seeders\Profil\DeskripsiKomiteSeeder;
use Database\Seeders\Profil\KetuaKomiteSeeder;
use Database\Seeders\Profil\KomiteSeeder;
use Database\Seeders\Profil\LogoSeeder;
use Database\Seeders\Profil\PotensiSeeder;
use Database\Seeders\Profil\RencanaSeeder;
use Database\Seeders\Profil\SejarahSeeder;
use Database\Seeders\Profil\StrukturSeed;
use Database\Seeders\Profil\VisiMisiSeeder;
use Database\Seeders\Profil\Wakaseeder;
use Database\Seeders\Program\BisnisPhotoSeeder;
use Database\Seeders\Program\BisnisSeeder;
use Database\Seeders\Program\BursaSeed;
use Database\Seeders\Program\IndustriSeeder;
use Database\Seeders\Program\KerjaSeeder;
use Database\Seeders\Program\PeraturanSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $this->call([UserSeeder::class,kepsekSeeder::class,KategoriSeeder::class,GuruSeeder::class,ArticleSeeder::class,GaleriSeeder::class,ProfilSeeder::class,MasukanSeeder::class,SejarahSeeder::class,PotensiSeeder::class,RencanaSeeder::class,VisiMisiSeeder::class,LogoSeeder::class,DeskripsiKomiteSeeder::class,KomiteSeeder::class,KetuaKomiteSeeder::class,StrukturSeed::class,KerjaSeeder::class,PeraturanSeeder::class,BisnisSeeder::class,BisnisPhotoSeeder::class,IndustriSeeder::class,BursaSeed::class,SijaSeeder::class,BogaSeeder::class,AkuntansiSeeder::class,BusanaSeeder::class,DkvSeeder::class,AnimasiSeeder::class,TkrSeeder::class,PrestasiSeeder::class,EkstrakulikulerSeeder::class,OsisSeeder::class,BeasiswaSeeder::class,PemetaanSeeder::class,SaranaSeeder::class,LinkSeeder::class,Wakaseeder::class,EkstraPhotoSeed::class,OsisPhotoSeed::class]);
    }
}

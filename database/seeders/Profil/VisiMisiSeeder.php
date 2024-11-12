<?php

namespace Database\Seeders\Profil;

use App\Models\Profil\VisiMisi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penulis = User::first();
        $data =[
            "penulis_id"=>$penulis->id,
            "konten"=>"SMK Negeri 1 Gedangan Malang merupakan sekolah yang tergolong masih muda, SMK ini didirikan pada tahun 2010 dengan empat program keahlian, yaitu: Teknik Kendaraan Ringan, Multimedia, Jasa Boga, dan Busana Butik. Pada awal berdirinya, SMK Negeri 1 Gedangan sudah dilengkapi dengan berbagai fasilitas yang memadai, mulai dari ruang kelas dan bengkel praktik TKR. Seiring berjalannya waktu, SMK Negeri 1 Gedangan mulai menambah berbagai fasilitas untuk memenuhi kebutuhan pembelajaran, mulai dari Laboratorium Multimedia, Restoran Jasa Boga, dan Laboratorium Busana Butik.

            Minat besar masyarakat saat ini kepada Sekolah Menengah Kejuruan (SMK) mendorong SMK Negeri 1 Gedangan untuk berusaha lebih maju sehingga dibuka program keahlian baru, yaitu Akuntansi pada tahun 2017 dan Sistem Jaringan dan Aplikasi (SIJA) pada tahun 2018. Hal tersebut disebabkan karena SMK Negeri ingin selalu mengikuti perkembangan zaman. Walaupun kedua program keahlian tersebut masih tergolong baru, fasilitas untuk menunjang pembelajaran program keahlian Akuntansi dan SIJA sudah cukup lengkap, mulai dari ruang kelas, laboratorium Akuntansi, dan Laboratorium SIJA.

            Sistem pembelajaran SMK Negeri 1 Gedangan menggunkan full day school, pembelajaran dimulai pukul 06.45 WIB dan berakhir pukul 15.00. pada pagi hari, kegiatan dimulai dengan sholat dhuha bersama guna untuk meningkatkan sikap religious peserta didik yang beragama islam. Selain sholat dhuha setiap pagi, kegiatan lain untuk meningkatkan sikap religious peserta didik adalah sholat dhuhur dan sholat ashar berjamaah.

            Dalam kegiatan belajar mengajar sehari-hari, SMK Negeri 1 Gedangan selalu memanfaatkan teknologi informasi, mulai dari penyampaian materi hingga pelaksanaan evaluasi pembelajaran . Bahkan, ujian semester pun juga berbasis computer (paperless) sehingga kemungkinan terjadi kecurangan sangat kecil.

            SMK Negeri 1 Gedangan tidak hanya mewadahi peserta didik dalam bidang akademik, non akademik pun juga turut dikembangkan dalam kegiatan ekstrakurikuler. Ekstrakurikuler di SMK Negeri 1 Gedangan, antara lain: Futsal, Sepakbola, Basket, Voli, Badan Dakwah Islam, Pencak Silat, Taekwondo, Pramuka, PMR, Tari, Band, Jurnalis. Seluruh ekstrakurikuler dilaksanakan sepulang sekolah sesua dengan jadwal masing masing kegiatan.",
        ];
        VisiMisi::create($data);
    }
}

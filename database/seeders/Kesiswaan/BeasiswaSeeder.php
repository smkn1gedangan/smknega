<?php

namespace Database\Seeders\Kesiswaan;

use App\Models\Kesiswaan\Beasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penulis = User::first();
        $data = [
            "penulis_id"=> $penulis->id,
            "konten"=>"Rencana Pengembangan Sekolah (RPS) merupakan salah satu wujud dari salah satu fungsi manajemen sekolah yang amat penting, yang harus dimiliki sekolah untuk dijadikan sebagai panduan dalam menyelenggarakan pendidikan di sekolah, baik untuk jangka panjang (20 tahun), menengah (5 tahun) maupun pendek (satu tahun)
            \n
            Rencana Pengembangan Sekolah (RPS) memiliki fungsi amat penting guna memberi arah dan bimbingan bagi para pelaku sekolah dalam rangka pencapaian tujuan sekolah yang lebih baik (peningkatan, pengembangan) dengan resiko yang kecil dan untuk mengurangi ketidakpastian masa depan
            \n
            Standar Nasional Pendidikan ( standar kelulusan, kurikulum, proses, pendidikan dan tenaga kependidikan, sarana dan prasarana, pembiayaan, pengelolaan, dan penilaian pendidikan) merupakan substansi penting dalam sistem pengelolaan sekolah yang harus direncanakan sebaik-baiknya dan diakomodir dalam penyusunan Rencana Pengembangan Sekolah.
            \n
            Atas dasar itu, Depdiknas telah menyiapkan sebuah panduan teknis bagi sekolah dalam penyusunan Rencana Pengembangan Sekolah,  yang disampaikan oleh Prof. Slamet PH. MA, MEd, MA, MLHR, Ph.D,  yang mengupas tentang:
            \n
            Pentingnya Rencana Pengembangan Sekolah (RPS). RPS penting dimiliki untuk memberi arah dan bimbingan para pelaku sekolah dalam rangka menuju perubahan atau tujuan sekolah yang lebih baik (peningkatan, pengembangan) dengan resiko yang kecil dan untuk mengurangi ketidakpastian masa depan.
            Arti Perencanaan Sekolah/RPS.Perencanaan sekolah adalah suatu proses untuk menentukan tindakan masa depan sekolah yang tepat, melalui urutan pilihan, dengan memperhitungkan sumberdaya yang tersedia.RPS adalah dokumen tentang gambaran kegiatan sekolah di masa depan dalam rangka untuk mencapai perubahan/tujuan sekolah yang telah ditetapkan.
            Tujuan Rencana Pengembangan Sekolah (RPS). RPS disusun dengan tujuan untuk: (1) menjamin agar perubahan/tujuan sekolah yang telah ditetapkan dapat dicapai dengan tingkat kepastian yang tinggi dan resiko yang kecil; (2) mendukung koordinasi antar pelaku sekolah; (3) menjamin terciptanya integrasi, sinkronisasi, dan sinergi baik antar pelaku sekolah, antarsekolah dan dinas pendidikan kabupaten/kota, dan antarwaktu
            Sistem Perencanaan Sekolah (SPS). Sistem Perencanaan Sekolahadalah satu kesatuan tata cara perencanaan sekolah untuk meng-hasilkan rencana-rencana sekolah (RPS) dalam jangka panjang, jangka menengah, dan tahunan yang dilaksanakan oleh unsur penyelenggara sekolah dan masyarakat (diwakili oleh komite sekolah).
            Tahap-tahap Penyusunan Rencana Pengembangan Sekolah (RPS), mencakup: (a) Melakukan analisis lingkungan strategis sekolah; (b) Melakukan analisis situasi untuk mengetahui status situasi pendidikan sekolah saat ini (IPS); (c) Memformulasikan pendidikan yang diharapkan di masa mendatang; (d) Mencari kesenjangan antara butir 2 & 3; (e) Menyusun rencana strategis; (f) Menyusun rencana tahunan;  (g) Melaksanakan rencana tahunan; dan (h) Memonitor dan mengevaluasi"

        ];
        Beasiswa::create($data);
    }
}

<?php

namespace Database\Seeders\Profil;

use App\Models\Profil\Potensi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penulis = User::first();
        $data = [
            "penulis_id"=> $penulis->id,
            "konten"=>"SMA Negeri 1 Banyuwangi merupakan satu-satunya SMA Negeri yang berada di Kecamatan kota Banyuwangi. Oleh sebab itu lebih dikenal dengan sebutan SMANTA (SMA Kota. SMA Negeri 1 Banyuwangi, dan termasuk sekolah yang paling muda dibanding dengan SMA Negeri yang lain yang berada di sekitarnya. SMA Negeri 1 Banyuwangi berdiri pada thun 1991 yang semula bernama SMA Negeri 3 Banyuwangi.

            SMA Negeri 1 Banyuwangi terletak di Jalan Ikan Tongkol, berada pada ruas jalan yang sama dengan UNIBA (Universitas PGRI Banyuwangi), merupakan sebuah jalan yang bisa dikategorikan pada jalan yang tidak ramai atau padat lalu-lintas. Hal ini membuat situasi belajar mengajar di SMA Negeri 1 Banyuwangi menjadi semakin nyaman, aman dan sehat.

            Lingkungan sangat berperan dalam membentuk sebuah karakter. Lingkungan seharusnya dipahami juga sebagai faktor penting dalam membentuk karakter peserta didik. Jika sekolah tidak berwawasan lingkungan pasti lingkungan pendidikan tidak terawat, rumput dibiarkan tumbuh secara liar, sampah tercecer di mana-mana, kamar kecil tidak terawat, lantai tidak disapu secara rutin, maka akan mempengaruhi kejiwaan siapa saja yang berada di lingkungan itu.

            Betapa besarnya peran lingkungan dalam membentuk perilaku seseorang dapat dilihat dalam gambaran berikut, seseorang akan merasa harus berhati-hati tatkala berada di tempat yang terawat, rapi dan bersih. Orang akan ikut menata dirinya agar tidak disalahkan oleh orang lain ketika perilakunya tidak sesuai dengan tuntutan lingkungannya. Siapapun tidak akan membuang sampah sembarangan bila berada di tempat yang sangat bersih, rapi dan terjaga dengan baik . Lingkungan yang rapi, tertib, dan bersih akan memaksa siapapun bertingkah laku sebagaimana seharusnya berada di tempat tersebut.

            UU No. 20 tahun 2003 menyatakan, Pendidikan adalah usaha sadar dan terencana untuk mew]ujudkan suasana belajar dan proses pembelajaran agar peserta didik secara aktif mengembangkan potensi dirinya untuk memiliki kekuatan spiritual keagamaaan, pengendalian diri, kepribadian, kecerdasan, akhlak mulia, serta ketrampilan yang diperlukan dirinya, masyarakat, bangsa, dan Negara.

            Atas dasar kenyataan itu maka, lingkungan pendidikan harus ditata dan dirawat hingga kelihatan bersih dan rapi. Lingkungan harus dijadikan sebagai faktor penting untuk membentuk pribadi peserta didik yang belajar di sekolah atau kampus. Sekolah atau kampus tidak boleh dibiarkan kotor dan tidak terurus.


            Pada tahun pelajaran 2012/2013 memiliki siswa berjumlah lebih kurang 720 siswa, yang terbagi kedalam 18 rombel, dengan waktu penyelenggaraan belajar dilaksanakan pada pagi hari , dengan distribusi kelas X berjumlah 7 rombel, kelas XI IPA berjumlah 3 rombel, kelas XI IPS berjumlah 3 rombel, kelas XII IPA berjumlah 3 dan kelas XII IPS berjumlah 3 rombel. SMANegeri 1 Banyuwangi mempunyai tenaga pendidik sejumlah 47 orang dan tenaga kependirikan sebanyak 1 orang.

            Dari sekilas uraian diatas dapat kita paparkan beberapa potensi berupa kekuatan yang dimiliki sekolah yang bisa dikembangkan: Pada tahun ajaran 2012/2013 SMA Negeri 1 Banyuwangi memiliki jumlah siswa sebanyak 720 siswa, dan tenaga Pendidik 47 orang, dan karyawan 24 orang. dengan jumlah siswa dan karyawan yang seluruhnya mencapai 791 orang, merupakan kekuatan yang potensial, jika jumlah 791 orang penghuni sekolah ini bisa mendukung dan bekerja sama dalam menangani masalah lingkungan maka masalah lingkungan akan bisa cepat terselesaikan sehingga lingkungan benar-benar akan indah sejuk nyaman dan dapat mendukung dalam kegiatan belajar mengajar terutama sebagai sumber belajar.

            Jika dalam kurun waktu tertentu dari jumlah 76 orang tersebut melaksanakan fungsi lingkungan disekolah dan melakukan pengimbasan kehidupan yang peduli lingkungan dimasyarakat sekitar misalnya masalah efisiensi sumber daya alam dan pengelolahan sampah maka jangka panjang budaya peduli lingkangan akan menyebar keseluruh masyarakat luas.

            Potensi sumber daya manusia ini hendaknya dapat mendukung dalam menciptakan sekolah yang berkarakter , peduli dan berbudaya lingkungan."

        ];
        Potensi::create($data);
    }
}

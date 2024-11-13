<?php

namespace Database\Seeders\Profil;

use App\Models\Profil\DeskripsiKomite;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeskripsiKomiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penulis = User::first();
        $dataDeskripsi = [
            "penulis_id"=> $penulis->id,
            "konten"=>"Komite Sekolah adalah badan mandiri yang mewadahi peran serta masyarakat dalam rangka meningkatkan mutu, pemerataan, dan efisiensi pengelolaan pendidikan di satuan pendidikan, baik pada pendidikan pra sekolah, jalur pendidikan sekolah maupun jalur pendidikan di luar sekolah (Kepmendiknas nomor: 044/U/2002).

            Maksud dibentukanya komite sekolah adalah agar suatu organisasi masyarakat sekolah yang mempunyai komitmen dan loyalitas serta peduli terhadap peningkatan kualitas sekolah. Komite sekolah yang dibentuk dapat dikembangkan secara khas dan berakar dari budaya, demografis, ekologi, nilai kesepakatan, serta kepercayaan yang dibangun sesuai dengan potensi masyarakat setempat. Oleh karena itu, komite sekolah yang dibangun harus merupakan pengembangan kekayaan filosofis masyarakat secara kolektif. Artinya, komite sekolah mengembangkan konsep yang berorientasi kepada pengguna (client model), berbagai kewenangan (power sharing and advocacy model), dan kemitraan (partnership model) yang difokuskan pada peningkatan mutu pelayanan pendidikan.

            Komite sekolah di suatu sekolah tetap eksis, namun fungsi, tugas, maupun tanggung jawabnya disesuaikan dengan kebutuhan sekolah. Peran komite sekolah bukan hanya sebatas pada mobilisasi sumbangan, dan mengawasi pelaksanaan pendidikan esensi dari partisipasi komite sekolah adalah meningkatkan kualitas pengambilan keputusan dan perencanaan sekolah yang dapat merubah pola pikir, keterampilan, dan distribusi kewenangan atas individual dan masyarakat yang dapat memperluas kapasitas manusia meningkatkan taraf hidup dalam system manajemen pemberdayaan sekolah.

            Dasar Hukum

            Permendikbud No. 75 Tahun 2016 Komite Sekolah

            Pengurus Komite

            Ketua
            Hj. Sunarti
            Sekretrais
            Ali Masyhar, A.md.
            Bendahara
            Dyah Siskawati, S.Pd. & Moch. Ikhwan Aziz, S.E.
            Bidang Pembangunan dan Sarana Prasarana
            Bidang Pengendalian Kualitas Pelayanan Pendidikan
            Bidang Jaringan Kerjasama
            Bidang Pengelolaan Dana Masyarakat
            Bidang Penggalian Sumber daya Sekolah
            Tugas dan Kewajiban Komite Sekolah

            Menyusun AD dan ART Komite Sekolah.
            Mendorong tumbuhnya perhatian dan komitmen masyarakat terhadap penyelenggaraan pendidikan yang bermutu.
            Melakukan kerjasama dengan masyarakat dan pemerintah berkenaan dengan penyelenggaraan pendidikan yang bermutu.
            Menampung dan menganalisis aspirasi, ide, tuntutan, dan berbagai kebutuhan pendidikan yang diajukan masyarakat.
            Memberi masukan, pertimbangan, dan rekomendasi kepada sekolah mengenai: - kebijakan dan program sekolah, RKAS, kriteria kinerja sekolah, kriteria tenaga kependidikan, kriteria fasilitas pendidikan, dan hal-hal lain yang terkait dengan pendidikan.
            Mendorong orang tua dan masyarakat berpartisipasi dalam pendidikan guna mendukung peningkatan mutu dan pemerataan pendidikan.
            Menggalang dana masyarakat dalam rangka pembiayaan penyelenggaraan pendidikan di sekolah.
            Melakukan evaluasi dan pengawasan terhadap kebijakan program, penyelenggaraan dan keluaran pendidikan di sekolah.
            Fungsi Komite Sekolah

            Fungsi komite sekolah untuk menjalankan peran yang telah disebutkan di muka, komite sekolah memiliki fungsi sebagai berikut :

            Mendorong tumbuhnya perhatian dan komitmen masyarakat terhadap penyelenggaraan pendidikan yang bermutu.
            Melakukan kerjasama dengan masyarakat (perorangan/ organisasi/dunia usaha dan dunia industry (DUDI) dan pemerintah berkenaan dengan penyelenggaraan pendidikan bermutu
            Menampung dan menganalisis aspirasi, ide, tuntutan, dan berbagai kebutuhan pendidikan yang diajukan oleh masyarakat.
            Peran Komite Sekolah

            Keberadaan komite sekolah harus bertumpu pada landasan partispasi masyarakat dalam meningkatkan kualitas pelayanan dan hasil pendidikan di satuan pendidikan/ sekolah. Oleh karena itu, pembentukan komite sekolah harus memperhatikan pembagian peran sesuai posisi dan otonomi yang ada. Peran komite sekolah adalah :

            Sebagai lembaga pemberi. Pertimbangan (advisory agency) dalam penentuan dan pelaksanaan kebijakan pendidikan di satuan pendidikan.
            Sebagai lembaga pendukung (supporting agency), baik yang berwujud finansial, pemikiran, maupun tenaga dalam penyelenggaraan pendidikan di satuan pendidikan.
            Sebagai pengontrol (controlling agency) dalam rangka transparasi dan akuntabilitas penyelenggaraan dan keluaran pendidikan di satuan pendidikan.
            Sebagai lembaga mediator (mediator agency) antara pemerintah (eksekutif) dengan masyarakat di satuan pendidikan
            Uraian Tugas Komite sekolah

            Ketua Bertanggung jawab terhadap pelaksanaan tugas dan kewajiban komite sekolah.

            Mengkoordinasikan, mengendalikan, dan melakukan pengawasan pelaksanaan tugas baik pengurus harian maupun pengurus bidang agar tercapai kinerja organisasi yang maksimal.
            Mengkoordinasikan dan mengkomunikasikan aspirasi dan kepentingan anggota komite dan masyarakat terkait dengan kebijakan pendidikan di SMK Negeri 1 Bancak.
            Sekretaris

            Bertanggung jawab terhadap pembuatan, pendistribusian, pengarsipan surat menyurat baik untuk kepentingan internal komite sekolah maupun eksternal.
            Bertanggung jawab terhadap penyediaan dan kelengkapan alat-alat administrasi yang diperlukan oleh komite sekolah.
            Bertanggung jawab terhadap pengelolaan sekretariat komite sekolah demi kelancaran organisasi dan pelayanan publik.
            Bersama-sama ketua dan ketua bidang menyusun laporan penyelenggaraan komite baik laporan akhir semester maupun laporan akhir tahun.
            Membuat notulen pada setiap rapat baik rapat terbatas, rapat paripurna, maupun rapat luar biasa.
            Bendahara

            Menerima dan membukukan sumbangan baik yang berasal dari orang tua maupun pihak lain ke dalam kas komite sekolah.
            Dengan persetujuan ketua komite sekolah dan/atau kepala sekolah mengeluarkan dan membukukan keuangan ke dalam kas komite sekolah.
            Membuat laporan secara periodik baik laporan bulanan, akhir semester, akhir tahun, maupun laporan keuangan lain yang dianggap perlu oleh komite sekolah maupun pihak sekolah.
            Bidang Pembangunan dan Sarana Prasarana

            Bersama-sama dengan komponen sekolah melakukan analisis kebutuhan sarana prasarana yang dibutuhkan baik terkait langsung dengan proses belajar mengajar maupun tidak.
            Menelaah dan meneliti analisis pembiayaan yang diajukan oleh sekolah dalam rangka pengadaan sarana prasarana dan pembangunan fisik yang didanai komite sekolah.
            Bertanggung jawab dalam pengawasan pelaksanaan pembangunan fisik, baik yang dilakukan oleh sekolah dan/atau komite sekolah yang pendanaannya melibatkan komite sekolah.
            Bersama-sama Bidang Penggalangan Dana dan Bidang Komunikasi Publik secara aktif mengkomunikasikan kebutuhan sarana prasarana yang dibutuhkan oleh sekolah kepada pihak-pihak yang berkeinginan untuk membantu pengadaan sarana prasarana tersebut.
            Bidang Pengendalian Kualitas Pelayanan Pendidikan

            Melakukan penelitian terhadap arah pengembangan pendidikan baik secara lokal, regional, nasional, maupun internasional yang nantinya dapat digunakan sebagai dasar pengembangan pendidikan di SMK Negeri 1 Bancak.
            Bersama-sama pihak sekolah memetakan potensi orang tua / wali murid berdasarkan taraf ekonomi dan pendidikan yang dapat digunakan sebagai pijakan pengambilan keputuasan baik oleh sekolah dan/atau komite sekolah terkait dengan besarnya partisipasi masyarakat dalam rangka mendukung proses pendidikan di SMK Negeri 1 Bancak.
            Bersama-sama pihak sekolah memetakan potensi siswa yang nantinya digunakan sebagai dasar untuk mengembangkan jenis dan sistem pembelajaran yang dapat memaksimalkan potensi siswa tersebut.
            Bersama-sama pihak sekolah memetakan potensi dan kekurangan guru yang nantinya digunakan sebagai pijakan untuk melaksanakan kegiatan-kegiatan dalam rangka untuk meningkatkan kompetensi guru untuk memenuhi kriteria tenaga kependidikan yang diinginkan.
            Bersama-sama pihak sekolah mengamati kebutuhan, jenis dan jumlah pegawai yang akan mendukung proses belajar mengajar sehingga tercapai sebuah pelayanan pendidikan yang prima.
            Bidang Jaringan Kerjasama

            Secara aktif melakukan komunikasi dalam rangka menjalin kerjasama yang baik dengan lembaga pendidikan lain guna pengembangan sistem dan tenaga kependidikan di SMK Negeri 1 Bancak.
            Secara aktif melakukan komunikasi dengan dunia usaha dan dunia industri dalam rangka menjalin kerjasama untuk pengembangan pendidikan vokasional, on the job training, kunjungan industri, dll.
            Bidang Pengelolaan Dana Masyarakat

            Bersama-sama bendahara komite sekolah mencari terobosan-terobosan baru dalam rangka menggalang dana baik dari masyarakat, lembaga pemerintahan maupun swasta, dunia industri, lembaga swadaya masyarakat (LSM), baik di dalam negeri maupun di luar negeri.
            Bidang Penggalian Sumber daya Sekolah

            Menyebarluaskan informasi yang berkaitan dengan keberadaan komite sekolah dan program-programnya kepada masyarakat dalam rangka mencari dukungan dan mengeliminasi adanya persepsi yang tidak benar tentang komite sekolah.
            Bersama-sama dengan bidang-bidang yang lain mengkomunikasikan keberadaan SMK Negeri 1 Bancak kepada pihak-pihak lain dalam rangka mencari dukungan dan berkenaan dengan sistem pendidikan, sarana prasarana pendidikan, maupun hal-hal lain yang terkait langsung maupun tidak langsung dengan proses pendidikan di SMK Negeri 1 Bancak.
            Tata Tertib Komite Sekolah

            Pengurus Komite Sekolah secara bergiliran melaksanakan tugas sebagai piket komite sekolah;
            Setiap pengurus Komite Sekolah yang bertugas sebagai piket komite sekolah diwajibkan untuk mengisi daftar hadir piket;
            Berpakaian rapih dan sopan ketika berada dilingkungan sekolah;
            Bersikap ramah dan sopan santun kepada semua warga sekolah;
            Memberikan informasi yang diberikan oleh sekolah;
            Menjaga amanah dan membantu mewujudkan harapan orang tua siswa yang telah mempercayakan putera/puterinya untuk mendapatkan pendidikan di SMK Negeri 1 Bancak;
            Membantu dan berperan aktif dalam pengadaan sarana dan prasarana guna perkembangan pendidikan di SMK Negeri 1 Bancak;
            Berperan aktif dalam menjaga keamanan, kebersihan, dan kesehatan lingkungan sekolah serta iklim kekeluargaan antar warga sekolah.
            Saling tukar informasi secara kontinyu antara Komite Sekolah dengan sekolah mengenai perkembangan pendidikan di SMK Negeri 1 Bancak.
            Melakukan konsultasi dan koordinasi dengan Kepala Sekolah di dalam hak perencanaan/pelaksanaan program maupun pemecahan masalah sekolah dengan program penyelenggaraan pendidikan di SMK Negeri 1 Bancak berjalan sesuai yang diharapkan
            Diskusi untuk mendapatkan alternatif pemecahan masalah yang berhubungan dengan pengembangan pendidikan,norma, etika, dan budi pekerti."

        ];
        DeskripsiKomite::create($dataDeskripsi);
    }
}

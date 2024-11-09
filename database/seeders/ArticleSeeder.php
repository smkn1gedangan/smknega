<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Kategori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $kategori = Kategori::get();
        $writer = User::first();
        $currentDateTime = Carbon::now()->format('Y-m-d-H-i-s');
        $articles = [
            ['title' => 'Berita Terbaru di Dunia', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
            ['title' => 'Piala Dunia 2024', 'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.'],
            ['title' => 'Prestasi Atlet Indonesia', 'content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus.'],
            ['title' => 'Olahraga Meningkatkan Imunitas', 'content' => 'Ut enim ad minima veniam, quis nostrum exercitationem ullam.'],
            ['title' => 'Perkembangan Teknologi', 'content' => 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse.'],
            ['title' => 'Ekonomi di Masa Pandemi', 'content' => 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus.'],
            ['title' => 'Kemajuan Pendidikan', 'content' => 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis.'],
            ['title' => 'Fakta Menarik Tentang Olahraga', 'content' => 'Nam libero tempore, cum soluta nobis est eligendi optio cumque.'],
            ['title' => 'Peluang Karir di Dunia IT', 'content' => 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.'],
            ['title' => 'Peran Anak Muda dalam Pembangunan', 'content' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa.'],
        ];

        foreach ($articles as $index => $articleData) {
            $article = Article::create([
                'slug' => strtolower(str_replace(' ', '-', $articleData["title"])) . '-' . $currentDateTime,
                'title' => $articleData['title'],
                'writer_id' => $writer->id,
                'view' => rand(50, 100),
                'text_content' => $articleData['content'],
                'image' => '1730947608_WISUDA.jpg'
            ]);

            if ($index < 5) {
                $article->kategoris()->attach($kategori->where('nama', 'Berita')->first());
                $article->kategoris()->attach($kategori->where('nama', 'Olahraga')->first());
            } else {
                $article->kategoris()->attach($kategori->where('nama', 'Prestasi')->first());
            }
        }
    }
}


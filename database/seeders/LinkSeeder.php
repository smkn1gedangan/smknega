<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $datas = [
        [
            "facebook"=>"https://yotuubeads",
            "tiktok"=>"https://yotuubeads",
            "instagram"=>"https://yotuubeads",
            "website"=>"https://yotuubeads"
        ]
    ];
    foreach ($datas as $data) {
        Link::create($data);
    }
    }
}

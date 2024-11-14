<?php

namespace Database\Seeders\Program;

use App\Models\Program\BisnisPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BisnisPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>''],
            ["photo"=>'']
        ];
        foreach ($data as $d) {
          BisnisPhoto::create($d);  
        }
    }
}

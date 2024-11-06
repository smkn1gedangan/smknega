<?php

namespace Database\Seeders;

use App\Models\Kepsek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class kepsekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $data =[
            "nama"=>"Usam muhajir Spd.Msi",
            "sambutan"=> "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum quia deserunt ut, magni laudantium asperiores inventore accusamus officia sequi modi velit aspernatur debitis eligendi ab aliquid ipsam sit ad alias tempore molestiae sint tenetur quis dolorem? Illo quis provident ad sunt praesentium porro reiciendis impedit quibusdam optio corporis doloribus, nihil illum aperiam eaque ullam magni reprehenderit natus nisi sint commodi molestiae accusamus hic! Beatae dicta repellendus delectus laboriosam, voluptate in possimus voluptatibus expedita tempora sit repellat! Perferendis dolorem corporis voluptatem magni suscipit est fugiat quasi? Voluptatibus iusto dolore sequi assumenda eos, voluptas illum sit delectus, quia nesciunt neque iste animi veritatis explicabo ipsum, asperiores nobis provident quod harum velit molestiae accusantium quam. Quis minus nihil porro nesciunt, aliquid, dolore explicabo repellat consequatur modi nisi expedita incidunt recusandae! Sapiente veritatis blanditiis accusamus, voluptate fugit quaerat in, nisi architecto fugiat impedit dolore obcaecati sint esse vero corrupti odit minima eos eaque. Mollitia, quia! Iusto, culpa consequuntur! Illo nisi molestiae ea tenetur voluptas nam architecto praesentium pariatur laborum quae error mollitia repellendus hic itaque rem cum, quod obcaecati unde aliquam. Explicabo nobis rerum tempora sint at consequatur omnis similique quia laborum architecto sequi accusantium quaerat quidem saepe eveniet odio assumenda, sapiente dicta. Optio.",
            "photo"=> $faker->imageUrl(),
        ];
        Kepsek::create($data);
    }
}

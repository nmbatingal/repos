<?php

use Illuminate\Database\Seeder;
use App\Articles;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<50; $i++) {
          	Articles::create([
            	'title' => $faker->sentence(3),
            	'body'  => $faker->paragraph(6),
            	'tags'  => join(',', $faker->words(4))
          	]);
        }
    }
}

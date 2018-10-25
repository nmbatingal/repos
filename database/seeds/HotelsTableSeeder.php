<?php

use Illuminate\Database\Seeder;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
            'name' => 'Zacale Hotel',
            'description' => 'Zacale hotel, Morogoro Road, Ndugumbi, Sisi Kwa Sisi, Makumbusho, Dar es Salaam, Coastal, 78570.',
            'image' => 'zacale',
        ]);

        DB::table('hotels')->insert([
            'name' => 'Southern Sun Hotel Dar es Salaam',
            'description' => 'Southern Sun Hotel Dar es Salaam, Hamburg Avenue, Mnazi Mmoja, Posta Mpya, Makumbusho, Dar es Salaam, Coastal, 3918, Tanzania.',
            'image' => 'southern_sun',
        ]);

        DB::table('hotels')->insert([
            'name' => 'Hotel Agip',
            'description' => 'Hotel Agip, Pamba Rd., Mnazi Mmoja, Posta Mpya, Dar es Salaam, Coastal, 3918, Tanzania.',
            'image' => 'agip',
        ]);
    }
}

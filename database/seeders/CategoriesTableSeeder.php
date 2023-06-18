<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->insert([
            'title' => 'PercussionInstruments',
            'desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, enim!',
            'img' => 'public/img/product_15.jpg',
            'alias' => 'percussioninstruments',
        ]);
    }
}

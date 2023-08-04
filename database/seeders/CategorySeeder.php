<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $erkek = Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => null,
            'name' => 'Erkek',
            'content' => 'Erkek Giyim',
            'status'=>'1'
        ]);


          Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $erkek->id,
            'name' => 'Erkek Kazak',
            'content' => 'Erkek Kazaklar',
            'status'=>'1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $erkek->id,
            'name' => 'Erkek Pantolon',
            'content' => 'Erkek Pantolonlar',
            'status'=>'1'
        ]);


        $kadin = Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => null,
            'name' => 'Kadın',
            'content' => 'Kadın Giyim',
            'status'=>'1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $kadin->id,
            'name' => 'Kadın Çanta',
            'content' => 'Kadın Çantalar',
            'status'=>'1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $kadin->id,
            'name' => 'Kadın Pantolon',
            'content' => 'Kadın Pantolonlar',
            'status'=>'1'
        ]);



        $cocuk = Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => null,
            'name' => 'Çocuk',
            'content' => 'Çocuk Giyim',
            'status'=>'1'
        ]);


        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' =>  $cocuk->id,
            'name' => 'Çocuk Oyuncaklar',
            'content' => 'Çocuk Oyuncaklar',
            'status'=>'1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $cocuk->id,
            'name' => 'Çocuk Pantolon',
            'content' => 'Çocuk Pantolonlar',
            'status'=>'1'
        ]);
    }
}

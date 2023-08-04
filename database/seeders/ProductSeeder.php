<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Urun 1',
            'image'=> 'images/shoe_1.jpg',
            'category_id' => 1,
            'short_text'  => 'Kısabilgi',
            'price'=> 100,
            'size'=> 'Small',
            'color'=> 'Beyaz',
            'qty'=> 10,
            'status'=> '1',
            'content'=> '<p>Ürün baya iyi</p>'
        ]);


        Product::create([
            'name' => 'Urun 2',
            'image'=> 'images/cloth_2.jpg',
            'category_id' => 2,
            'short_text'  => 'Kısabilgi 2',
            'price'=> 150,
            'size'=> 'Large',
            'color'=> 'Siyah',
            'qty'=> 5,
            'status'=> '1',
            'content'=> '<p>Ürün Açıklama</p>'
        ]);
    }
}

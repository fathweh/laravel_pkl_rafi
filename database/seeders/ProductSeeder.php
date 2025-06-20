<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();
        DB::table('categories')->delete();

        $cat1 = Category::create([
            'name' => 'Elektronik',
            'slug' => 'Elektronik',
        ]);

        $cat2 = Category::create([
            'name' => 'perabotan-rumah',
            'slug' => 'perabotan-rumah',
        ]);

        Product::create([
            'name'  =>'Samsung S25 5G',
            'slug'  =>'Samsung-s25-5g',
            'category_id' => $cat1->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image.png',
            'price'       => 24000000,
            'stock'       => 100,
        ]);

         Product::create([
            'name'  =>'sapu Lidi',
            'slug'  =>'sapu Lidi',
            'category_id' => $cat2->id,
            'description' => 'Lorem Ipsum',
            'image'       => 'image.png',
            'price'       => 5000,
            'stock'       => 1000,
        ]);
    }
}

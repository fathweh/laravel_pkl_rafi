<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        Category::create([
            'name' => 'Elektronik',
            'slug' => 'Elektronik',
        ]);

        Category::create([
            'name' => 'perabotan-rumah',
            'slug' => 'perabotan-rumah',
        ]);
    }
}

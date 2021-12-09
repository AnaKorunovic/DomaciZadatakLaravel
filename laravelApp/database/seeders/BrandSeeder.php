<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::truncate();
        Brand::create([
            'name'=>"Zara",
            'slug'=>"zara",
            'category_id'=>Category::all()->random()->id,
            
 
        ]);
        Brand::create([
         'name'=>"H&M",
         'slug'=>"x&m",
         'category_id'=>Category::all()->random()->id,
         
 
     ]);
     Brand::create([
         'name'=>"Bershka",
         'slug'=>"bershka",
         'category_id'=>Category::all()->random()->id,
         
 
     ]);
    }
}

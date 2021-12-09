<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'name'=>"High-end",
            'slug'=>"high-end",
            'description'=>"this category is about high end brands"
 
        ]);
        Category::create([
         'name'=>"Low-end",
         'slug'=>"low-end",
         'description'=>"this category is about low-end brands"
 
     ]);
     Category::create([
         'name'=>"Handmade",
         'slug'=>"handmade",
         'description'=>"This category is about handmade brands"
 
     ]);
     Category::create([
         'name'=>"Steetstyle",
         'slug'=>"streetstyle",
         'description'=>"this category is about streetstyle brands"
 
     ]);
     Category::create([
         'name'=>"Business",
         'slug'=>"business",
         'description'=>"this category is all about business"
 
     ]);
    }
}

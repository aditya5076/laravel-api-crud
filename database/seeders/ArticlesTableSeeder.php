<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Article::class,30)->create(); //creates 30 articles rows
        \App\Models\Article::factory()->count(10)->create(); 
        
    }
}

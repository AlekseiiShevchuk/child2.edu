<?php

use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'категория 1',],

        ];

        foreach ($items as $item) {
            \App\Category::create($item);
        }
    }
}

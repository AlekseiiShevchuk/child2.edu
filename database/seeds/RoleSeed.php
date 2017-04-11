<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Администратор (может создавать других пользователей)',],
            ['id' => 2, 'title' => 'Обычный пользователь',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}

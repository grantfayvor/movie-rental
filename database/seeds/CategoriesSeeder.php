<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([[
            'id' => 1,
            'name' => 'FANTASY'
        ], [
            'id' => 2,
            'name' => 'FANFICTION'
        ], [
            'id' => 3,
            'name' => 'ADVENTURE'
        ], [
            'id' => 4,
            'name' => 'HORROR'
        ], [
            'id' => 5,
            'name' => 'SCIENCE FICTION'
        ], [
            'id' => 6,
            'name' => 'MUSICAL'
        ]]);
    }
}

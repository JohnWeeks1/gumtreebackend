<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fashion sub-categories
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'dress',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'pants',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'shoes',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name' => 'sneakers',
        ]);

        // Electronics sub-categories
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'computers',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'mobile phones',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name' => 'monitors',
        ]);

        // Home sub-categories
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'tables',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'sofas',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'lamps',
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name' => 'sheds',
        ]);
    }
}

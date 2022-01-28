<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Fashion Section
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 1,
                'name' => 'Nice Black Dress',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 13450,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Blue Jeans',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 1450,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Posh Shoes',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 376500,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 1,
                'sub_category_id' => 4,
                'name' => 'Old Skool Vans',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 5445,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);


        // Electronics Section
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 5,
                'name' => 'Dell Computer',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 3750,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 6,
                'name' => 'Samsung 10',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 1740,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 2,
                'sub_category_id' => 7,
                'name' => 'Philips Monitor',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 1300,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);


        // Home Section
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 8,
                'name' => 'Wooden Table',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 850,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 9,
                'name' => 'Ikea Sofa',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 1880,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 10,
                'name' => 'Bedroom Lamp',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 400,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        DB::table('ads')
            ->insert([
                'user_id' => 1,
                'category_id' => 3,
                'sub_category_id' => 11,
                'name' => 'Garden Shed',
                'description' => 'This is a test description for the description section for some dummy data!!!',
                'price' => 5000,
                'location' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
    }
}

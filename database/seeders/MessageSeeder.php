<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')
            ->insert([
                'user_id' => 2,
                'seller_id' => 1,
                'ad_id' => 8,
                'message' => 'Hi, Is this item still available?',
                'message_sent_by' => 'buyer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        DB::table('messages')
            ->insert([
                'user_id' => 2,
                'seller_id' => 1,
                'ad_id' => 8,
                'message' => 'Yeah it is!',
                'message_sent_by' => 'seller',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        DB::table('messages')
            ->insert([
                'user_id' => 2,
                'seller_id' => 1,
                'ad_id' => 8,
                'message' => 'Can I come and collect it today?',
                'message_sent_by' => 'buyer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        DB::table('messages')
            ->insert([
                'user_id' => 2,
                'seller_id' => 1,
                'ad_id' => 8,
                'message' => 'Sure, what time will you arrive?',
                'message_sent_by' => 'seller',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

        DB::table('messages')
            ->insert([
                'user_id' => 2,
                'seller_id' => 3,
                'ad_id' => 2,
                'message' => 'Hey, you still got this?',
                'message_sent_by' => 'buyer',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
    }
}

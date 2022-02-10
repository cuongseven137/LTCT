<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert([
            ['user_id' => 1,'content' => 'Giao hàng nhanh chóng'],
            ['user_id' => 2,'content' => 'Tư vấn nhiệt tình'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('comments')->insert([
            ['user_id' => 1,'product_id' => 1,'comment' => 'Sản phẩm bị lỗi','photo' => 'https://didongviet.vn/pub/media/catalog/product//a/p/apple-iphone-11-tim-didongviet_5.jpg'],
            ['user_id' => 2,'product_id' => 2,'comment' => 'Sản phẩm không giống trong hình','photo' => null],
            ['user_id' => 3,'product_id' => 3,'comment' => 'Màu không đẹp','photo' => null],
            ['user_id' => 4,'product_id' => 1,'comment' => 'Kích thước hơi bé','photo' => 'https://didongviet.vn/pub/media/catalog/product//a/p/apple-iphone-11-tim-didongviet_5.jpg'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('warranty')->insert([
            ['product_id' => 1,'content' => 'Bảo hành một đổi một trong vòng 1 tháng đầu sử dụng','start_date'=>'2022-01-01','expired_date' => '2022-02-01'],
            ['product_id' => 2,'content' => 'Bảo hành một đổi một trong vòng 3 tháng đầu sử dụng','start_date'=>'2022-01-01','expired_date' => '2022-02-01'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductStatus;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "name" => "Đang bán",
            ],
            [
                "name" => "Đang nhập",
            ],
            [
                "name" => "Ngừng bán",
            ]
        ];

        foreach ($data as $item) {
            // Lưu dữ liệu vào cơ sở dữ liệu
            ProductStatus::create($item);
        }
    }
}

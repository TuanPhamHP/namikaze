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
                "id" => 1,
                "name" => "Đang bán",
            ],
            [
                "id" => 2,
                "name" => "Đang nhập",
            ],
            [
                "id" => 3,
                "name" => "Ngừng bán",
            ]
        ];

        foreach ($data as $item) {
            // Lưu dữ liệu vào cơ sở dữ liệu
            ProductStatus::create($item);
        }
    }
}

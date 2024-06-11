<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
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
                "name" => "Bàn ăn",
                "description" => "Bàn ăn",
                "image" => "https://baron.vn/wp-content/uploads/2018/12/ban-an-grace-11.jpg",
            ],
            [
                "name" => "Giường ngủ",
                "description" => "Giường ngủ",
                "image" => "https://noithatzito.vn/wp-content/uploads/2022/04/giuong-ngu-go-oc-cho-za-802-2.jpg",
            ],
            [
                "name" => "Tủ quần áo",
                "description" => "Tủ quần áo",
                "image" => "https://dogolegia.vn/wp-content/uploads/2023/05/thiet-ke-mau-tu-quan-ao-dep-hien-dai-am-tuong-LG-TQA241.jpg",
            ]
        ];

        foreach ($data as $item) {
            // Lưu dữ liệu vào cơ sở dữ liệu
            ProductCategory::create($item);
        }
    }
}

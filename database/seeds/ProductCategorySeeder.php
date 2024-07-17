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
                "name" => "Sofa",
                "description" => " Tất cả sản phẩm đều có chất lượng quốc tế, thương hiệu lớn.",
                "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD8JRQoc2a2hiyAwg6aIlxB4Hl8nO9Olvc0A&s",
            ],
            [
                "name" => "Bàn làm việc",
                "description" => "Bàn làm việc -  Tất cả sản phẩm đều có chất lượng quốc tế, thương hiệu lớn.",
                "image" => "https://xuongdeco.com/wp-content/uploads/2021/07/ban-lam-viec-deco-dlvr31.jpg",
            ],
            [
                "name" => "Giường ngủ",
                "description" => "Giường ngủ",
                "image" => "https://noithatzito.vn/wp-content/uploads/2022/04/giuong-ngu-go-oc-cho-za-802-2.jpg",
            ],

        ];

        foreach ($data as $item) {
            // Lưu dữ liệu vào cơ sở dữ liệu
            ProductCategory::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Ikea",
                "slug" => ["ikea", "ikea-viet-nam", "ikea-vn", "đồ nội thất"],
                "description" => "IKEA (viết tắt của Ingvar Kamprad Elmtaryd Agunnaryd) là một doanh nghiệp tư nhân của Thụy Điển. Hiện nay, đây là tập đoàn bán lẻ đồ nội thất lớn nhất thế giới; chuyên về thiết kế đồ nội thất bán lắp ráp, thiết bị và phụ kiện nhà ở.",
                "image" => "https://cafefcdn.com/zoom/700_438/2019/photo1547975213061-1547975213257-crop-15479753038491610957089.jpg",
                "is_active" => 1,
                "created_by" => null,
                "updated_by" => null
            ]
        ];

        foreach ($data as $item) {
            // Chuyển đổi mảng 'slug' thành chuỗi JSON trước khi lưu vào cơ sở dữ liệu
            $item['slug'] = json_encode($item['slug']);

            // Lưu dữ liệu vào cơ sở dữ liệu
            Brand::create($item);
        }
    }
}

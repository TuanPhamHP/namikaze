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
            ],
            [
                'name' => 'Ashley Furniture',
                'slug' => ['ashley-furniture', 'ashley', 'ashley-home'],
                'description' => 'Ashley Furniture Industries là một trong những nhà sản xuất và bán lẻ đồ nội thất lớn nhất ở Mỹ, nổi tiếng với các sản phẩm chất lượng và giá cả phải chăng.',
                'image' => 'https://www.ashleyfurniture.com/on/demandware.static/-/Sites-afw-catalog/default/dw7d8a25b7/images/products/AS0016-Radilyn-2-piece-Table-Set.jpg',
                'is_active' => 1,
                'created_by' => null,
                'updated_by' => null
            ],
            [
                'name' => 'Williams-Sonoma',
                'slug' => ['williams-sonoma', 'williams-sonoma-home', 'ws-home'],
                'description' => 'Williams-Sonoma, Inc. là một công ty bán lẻ đồ nội thất và đồ dùng nhà bếp hàng đầu của Mỹ, với các thương hiệu như Pottery Barn và West Elm.',
                'image' => 'https://media.williams-sonoma.com/pi/4e/4e/4e4e8c9d26b84940f4f5f0b44abf0376.jpg',
                'is_active' => 1,
                'created_by' => null,
                'updated_by' => null
            ],
            [
                'name' => 'La-Z-Boy',
                'slug' => ['la-z-boy', 'lazy-boy', 'la-z-boy-furniture'],
                'description' => 'La-Z-Boy Incorporated là một công ty của Mỹ chuyên sản xuất đồ nội thất gia đình, nổi tiếng nhất với ghế tựa thư giãn và sofa.',
                'image' => 'https://la-z-boy.scene7.com/is/image/LaZBoy/5DWE65-809_D141953_005?$PDP_FAMILY_&wid=650&hei=650',
                'is_active' => 1,
                'created_by' => null,
                'updated_by' => null
            ],
            [
                'name' => 'Herman Miller',
                'slug' => ['herman-miller', 'herman-miller-furniture', 'hm-furniture'],
                'description' => 'Herman Miller, Inc. là một công ty thiết kế và sản xuất đồ nội thất văn phòng, thiết bị y tế, và các sản phẩm liên quan nổi tiếng với thiết kế hiện đại.',
                'image' => 'https://millerknoll.scene7.com/is/image/HermanMillerStore/DXR__20211217161232__main?$hi-res$',
                'is_active' => 1,
                'created_by' => null,
                'updated_by' => null
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

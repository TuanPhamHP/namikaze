<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lấy danh sách brand_id từ bảng brands
        $brands = DB::table('brands')->pluck('id', 'name');

        // Tạo dữ liệu mẫu cho từng sản phẩm của mỗi brand
        $products = [];
        $productNames = [
            'Sofa', 'Bàn làm việc', 'Giường ngủ',
        ];
        $productDescriptions = [
            'Sofa' => 'Một chiếc sofa êm ái và bền bỉ, hoàn hảo cho phòng khách của bạn.',
            'Bàn làm việc' => 'Chiếc bàn chất lượng cao, phù hợp cho cả phòng ăn và làm việc.',
            'Giường ngủ' => 'Giường ngủ chắc chắn, mang lại giấc ngủ ngon và sâu.',
        ];
        $brandIdx = 0;
        $images = [
            'https://erado.vn/img/i/sofa-vai-ma-89-8745.png',
            'https://noithatkdt.vn/wp-content/uploads/2022/10/Bo-sofa-ni-goc-L-4-cho-ngoi-S36A-3.jpg',
            'https://binhgo.vn/wp-content/uploads/2023/07/sofa_tan_co_dien_go_tu_nhien_the_king-1.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSD8JRQoc2a2hiyAwg6aIlxB4Hl8nO9Olvc0A&s',
            'https://kalix.vn/cdn/shop/files/dorian-sofa-vang-da-2-cho-tua-lien-kalix-7_9e22f17f-8189-42e0-a65c-6807e9b5fe88_1024x1024.jpg?v=1717727029',

            'https://bizweb.dktcdn.net/thumb/large/100/419/787/products/o1cn01g4izlg1wtg5fucszp-2207895056366-0-cib.jpg?v=1650428085713',
            'https://xuongdeco.com/wp-content/uploads/2021/07/ban-lam-viec-deco-dlvr31.jpg',
            'https://image.thegioisofa.net/wp-content/uploads/2021/11/Ban-lam-viec-ban-van-phong-1.jpg',
            'https://noithattoz.com/wp-content/uploads/2023/10/ban-lam-viec-ikea-1m6-BIK1806.jpg',
            'https://noithattoz.com/wp-content/uploads/2023/10/ban-chu-l-ikea-1-600x600.jpg',

            'https://dogomanhhung.com/uploads/images/634fc215dfc29f68d57258e0/z3812119525960_9d3fba21753fc64d873dc2fa3fbcece6.jpg',
            'https://noithatzito.vn/wp-content/uploads/2022/04/giuong-ngu-go-oc-cho-za-802-2.jpg',
            'https://bizweb.dktcdn.net/thumb/large/100/446/644/products/vn-11134207-7qukw-lhq1iyll2f0lbf-1686369299093.jpg?v=1686732696803',
            'https://bizweb.dktcdn.net/thumb/1024x1024/100/367/937/products/giuong-tang-dep-cho-tre-em.jpg?v=1653994938387',
            'https://bizweb.dktcdn.net/100/358/409/files/o1cn01d80giu1gfrtvamuuu-2211842134169-0-cib.jpg?v=1642670254834'

        ];
        foreach ($brands as $brandName => $brandId) {
            for ($i = 0; $i < 3; $i++) {
                $productType = $productNames[$i];
                $products[] = [
                    'name' => $brandName . ' ' . $productNames[$i],
                    'description' => $productNames[$i] . ' - ' . $productDescriptions[$productType] . ' Sản phẩm này đến từ thương hiệu ' . $brandName . '.',
                    'preview_image' => $images[$i + $brandIdx],
                    'images' => json_encode([
                        'https://via.placeholder.com/150',
                        'https://via.placeholder.com/200',
                        'https://via.placeholder.com/250'
                    ]),
                    'price' => rand(100, 1000),
                    'quantity' => rand(1, 100),
                    'category_id' => $brandIdx + 1, // Giả sử tất cả sản phẩm đều thuộc một category, bạn có thể thay đổi giá trị này
                    'brand_id' => $brandId,
                    'status_id' => 1, // Giả sử status_id mặc định là 1
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        // Chèn dữ liệu vào bảng products
        DB::table('products')->insert($products);
        $brandIdx++;
    }
}

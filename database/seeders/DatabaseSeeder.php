<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = [['id' => 1, 'name' => 'كاميرات', 'description' => 'كاميرات إلكترونية', 'imagepath' => 'assets\img\camera.jpg'], 
                       ['id' => 2, 'name' => 'مأكولات', 'description' => 'أكل شعبي وعربي', 'imagepath' => 'assets\img\food.jpg'],
                       ['id' => 3, 'name' => 'مكياج', 'description' => 'أدوات تجميل وميكاج ماركات عالمية', 'imagepath' => 'assets\img\makeup.jpg'],
                       ['id' => 4, 'name' => 'إلكترونيات', 'description' => 'شاشات وكمبيوترات وطابعات', 'imagepath' => 'assets\img\electronic.jpg'],
                       ['id' => 5, 'name' => 'ساعات', 'description' => 'ساعات ثمينة وبرندات عالمية', 'imagepath' => 'assets\img\watch.jpg'],
                       ['id' => 6, 'name' => 'شنط', 'description' => 'شنط رجالي وشنط نسائي ماركات', 'imagepath' => 'assets\img\bag.jpg'],
                       ['id' => 7, 'name' => 'أثاث منزلي', 'description' => 'الأثاث الحديث والأثاث الكلاسيكي من أجود أنواع الخشب', 'imagepath' => 'assets\img\furniture.jpg'],
                       ['id' => 8, 'name' => 'تحف وهدايا', 'description' => 'أباجورات ومرآيا ومجسمات هندسية', 'imagepath' => 'assets\img\antiques.jpg'],
                    
                    ];

        DB::table('categories')->insertOrIgnore($categories);

        for ($i = 1; $i <= 25; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Description for Product ' . $i,
                'quantity' => rand(1, 50),
                'price' => rand(10, 100),
                'imagepath' => '',
                'category_id' => rand(1, 8),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name ="Iphone";
        $category->description ="Sang chảnh thật sự";
        $category->save();

        $category = new Category();
        $category->name ="Ipad";
        $category->description ="Sự lựa chọn sáng suốt cho thằng nhiều tiền";
        $category->save();

        $category = new Category();
        $category->name ="MacBook";
        $category->description ="Theo dòng xu thế khoe";
        $category->save();

        $category = new Category();
        $category->name ="SamSung";
        $category->description ="Trải nghiệm những điều điên rồ nhất";
        $category->save();

        $category = new Category();
        $category->name ="Phụ kiện";
        $category->description ="Thay đổi bề ngoài thay đổi cái nhìn";
        $category->save();
    }
}

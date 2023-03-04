<?php

namespace Database\Seeders;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategory = SubCategory::create([
            'name' => 'Mobile Phone ',
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na',
             'category_id' => 3,
        ]);

        $subCategory = SubCategory::create([
            'name' => 'Tablets',
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na',
             'category_id' => 3,
        ]);

        $subCategory = SubCategory::create([
            'name' => "Women's Fashion",
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na',
             'category_id' => 2,
        ]);

        $subCategory = SubCategory::create([
            'name' => "Men's Fashion",
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na',
             'category_id' => 2,
        ]);

        $subCategory = SubCategory::create([
            'name' => "Kid's Fashion",
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na',
             'category_id' => 2,
        ]);

        $subCategory = SubCategory::create([
            'name' => "TVs",
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na',
             'category_id' => 1,
        ]);
    }
}

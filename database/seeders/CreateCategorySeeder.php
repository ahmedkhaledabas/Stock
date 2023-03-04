<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'Electronics',
            'describtion' => 'A retail establishment used for the selling or repairing of consumer electronic products such as home and car stereos,
             televisions, telephones, and personal computers',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na'
        ]);

        $category = Category::create([
            'name' => 'Fashion',
            'describtion' => 'A form of self-expression and autonomy at a particular period and place and in a specific context, of clothing,
             footwear, lifestyle, accessories, makeup, hairstyle, and body posture.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na'
        ]);

        $category = Category::create([
            'name' => 'Mobiles',
            'describtion' => 'A portable device for connecting to 
            a telecommunications network in order to transmit and receive voice, video, or other data.',
             'created_by' => 'Ahmed Khaled',
             'image' => 'Na'
        ]);

        
    }
}

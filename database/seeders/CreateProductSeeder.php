<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'name' => 'Iphone 11',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 300,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 3,
            'sub_category_id' => 1,
        ]);

        $product = Product::create([
            'name' => 'Iphone 13',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 500,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 3,
            'sub_category_id' => 1,
        ]);

        $product = Product::create([
            'name' => 'Ipad 13',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 500,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 3,
            'sub_category_id' => 2,
        ]);

        $product = Product::create([
            'name' => 'Kid T-Shirt',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 100,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 2,
            'sub_category_id' => 5,
        ]);

        $product = Product::create([
            'name' => 'Women T-Shirt',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 100,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 2,
            'sub_category_id' => 3,
        ]);

        $product = Product::create([
            'name' => 'Men T-Shirt',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 100,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 2,
            'sub_category_id' => 4,
        ]);

        $product = Product::create([
            'name' => 'TV Samsung',
            'image' => 'NA',
            'details' => 'NA',
            'price' => 100,
            'quantity' => 10,
            'created_by' => 'Ahmed Khaled',
            'category_id'=> 1,
            'sub_category_id' => 6,
        ]);
        
    }
}

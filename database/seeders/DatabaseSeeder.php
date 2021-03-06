<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'First User',
            'email' => 'user1@gmail.com',
            'usertype' => 0,
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'password' => Hash::make('parole123'),
            'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype' => 1,
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'password' => Hash::make('parole123'),
            'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'Second User',
            'email' => 'user2@gmail.com',
            'usertype' => 0,
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'password' => Hash::make('parole123'),
            'created_at' => date("Y-m-d H:i:s")],
        ];
        DB::table('users')->insert($users);

        $products = [
            ['title' => 'Black shirt',
            'price' => 20,
            'description' => 'Comfortable and stylish black shirt',
            'quantity' => 8,
            'image' => '1656179438.jpg',
            'created_at' => date("Y-m-d H:i:s")],
            ['title' => 'Hoodie',
            'price' => 40,
            'description' => 'Stylish designer hoodie made from warm material',
            'quantity' => 5,
            'image' => '1656179100.jpg',
            'created_at' => date("Y-m-d H:i:s")],
            ['title' => 'Black hat',
            'price' => 7,
            'description' => 'Cool hat for spending quality time',
            'quantity' => 9,
            'image' => '1656179547.jpg',
            'created_at' => date("Y-m-d H:i:s")],
            ['title' => 'Summer shirt',
            'price' => 20,
            'description' => 'Perfect blend of form and function',
            'quantity' => 10,
            'image' => '1655632462.jpg',
            'created_at' => date("Y-m-d H:i:s")],
            ['title' => 'Jeans',
            'price' => 15,
            'description' => 'Comfortable jeans for warm summer nights',
            'quantity' => 7,
            'image' => '1655990584.jpg',
            'created_at' => date("Y-m-d H:i:s")],
            ['title' => 'Shorts',
            'price' => 10,
            'description' => 'Cool looking shorts',
            'quantity' => 5,
            'image' => '1655990640.jpg',
            'created_at' => date("Y-m-d H:i:s")],
        ];
        DB::table('products')->insert($products);

        $orders = [
            ['name' => 'First User',
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'product_id' => '4',
            'product_name' => 'Summer shirt',
            'quantity' => 1,
            'price' => 20,
            'status' => 'Not delivered',
            'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'First User',
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'product_id' => '5',
            'product_name' => 'Jeans',
            'quantity' => 1,
            'price' => 15,
            'status' => 'Not delivered',
            'created_at' => date("Y-m-d H:i:s")],
            ['name' => 'First User',
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'product_id' => '6',
            'product_name' => 'Shorts',
            'quantity' => 1,
            'price' => 10,
            'status' => 'Not delivered',
            'created_at' => date("Y-m-d H:i:s")],
        ];
        DB::table('orders')->insert($orders);

        $reviews = [
            ['user_id' => '1',
            'prod_id' => '4',
            'stars' => 3,
            'created_at' => date("Y-m-d H:i:s")],
            ['user_id' => '1',
            'prod_id' => '5',
            'stars' => 4,
            'created_at' => date("Y-m-d H:i:s")],
            ['user_id' => '1',
            'prod_id' => '6',
            'stars' => 5,
            'created_at' => date("Y-m-d H:i:s")],
            ['user_id' => '3',
            'prod_id' => '5',
            'stars' => 5,
            'created_at' => date("Y-m-d H:i:s")],
        ];
        DB::table('reviews')->insert($reviews);

        $comments = [
            ['user_id' => '1',
            'prod_id' => '4',
            'comment' => 'Very nice and stylish product. Im happy with the result. Delivery was also very fast. Thank you so much for this amazing item!',
            'created_at' => date("Y-m-d H:i:s")],
            ['user_id' => '1',
            'prod_id' => '5',
            'comment' => 'Super cool looking amazing item and I am very happy thank you so much!',
            'created_at' => date("Y-m-d H:i:s")],
            ['user_id' => '1',
            'prod_id' => '6',
            'comment' => 'Very good quality and fast delivery super excited cant wait to wear it thankful for this amazing store',
            'created_at' => date("Y-m-d H:i:s")],
            ['user_id' => '3',
            'prod_id' => '5',
            'comment' => 'Very nice item im happy and I love it!',
            'created_at' => date("Y-m-d H:i:s")],
        ];
        DB::table('comments')->insert($comments);
    }
}

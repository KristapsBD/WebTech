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
            ['name' => 'user',
            'email' => 'user@gmail.com',
            'usertype' => 0,
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'password' => Hash::make('password123')],
            ['name' => 'admin',
            'email' => 'admin@gmail.com',
            'usertype' => 1,
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'password' => Hash::make('password123')],
        ];
        DB::table('users')->insert($users);

        $products = [
            ['title' => 'Summer shirt',
            'price' => 20,
            'description' => 'Perfect blend of form and function',
            'quantity' => 10,
            'image' => '1655632462.jpg'],
            ['title' => 'Jeans',
            'price' => 15,
            'description' => 'Comfortable jeans for warm summer nights',
            'quantity' => 7,
            'image' => '1655990584.jpg'],
            ['title' => 'Shorts',
            'price' => 10,
            'description' => 'Cool looking shorts',
            'quantity' => 5,
            'image' => '1655990640.jpg'],
        ];
        DB::table('products')->insert($products);

        $orders = [
            ['name' => 'user',
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'product_id' => '1',
            'product_name' => 'Summer shirt',
            'quantity' => 1,
            'price' => 20,
            'status' => 'Not delivered',
            ],
            ['name' => 'user',
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'product_id' => '2',
            'product_name' => 'Jeans',
            'quantity' => 1,
            'price' => 15,
            'status' => 'Not delivered',
            ],
            ['name' => 'user',
            'phone' => '+37120289000',
            'address' => 'Iecavas street 5',
            'product_id' => '3',
            'product_name' => 'Shorts',
            'quantity' => 1,
            'price' => 10,
            'status' => 'Not delivered',
            ],
        ];
        DB::table('orders')->insert($orders);

        $reviews = [
            ['user_id' => '1',
            'prod_id' => '1',
            'stars' => 3],
            ['user_id' => '1',
            'prod_id' => '2',
            'stars' => 4],
            ['user_id' => '1',
            'prod_id' => '3',
            'stars' => 5],
        ];
        DB::table('reviews')->insert($reviews);
    }
}

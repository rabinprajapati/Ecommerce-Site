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
        DB::table('products')->insert(
            [
                [
                    'productName' => 'fan',
                    'productCategory' =>'electronics',
                    'productPrice' => 3000,
                    'productDescription' => 'its a very good fan lorem ipsum',
                    'productGallery' => 'https://cdn.shopify.com/s/files/1/0122/0358/9732/products/Baroque_copy_720x720@2x.jpg',
                ],
                [
                    'productName' => 'fridge',
                    'productCategory' =>'electronics',
                    'productPrice' => 30000,
                    'productDescription' => 'its a very good fridge lorem ipsum',
                    'productGallery' => 'https://m.media-amazon.com/images/I/61tGvBnQW9L._AC_SX679_.jpg',
                ]
            ]
        );
    }
}

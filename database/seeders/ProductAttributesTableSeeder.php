<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('product_attributes')->delete();

        \DB::table('product_attributes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'product_id' => 1,
                'attribute_id' => 1,
                'attribute_val' => '1',
                'created_at' => '2022-08-02 17:45:39',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'product_id' => 1,
                'attribute_id' => 2,
                'attribute_val' => '2',
                'created_at' => '2022-08-02 17:45:40',
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'product_id' => 1,
                'attribute_id' => 3,
                'attribute_val' => '3',
                'created_at' => '2022-08-02 17:45:45',
                'updated_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'product_id' => 1,
                'attribute_id' => 4,
                'attribute_val' => '4',
                'created_at' => '2022-08-02 17:45:45',
                'updated_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'product_id' => 2,
                'attribute_id' => 2,
                'attribute_val' => '2',
                'created_at' => '2022-08-02 17:45:57',
                'updated_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'product_id' => 2,
                'attribute_id' => 3,
                'attribute_val' => '3',
                'created_at' => '2022-08-02 17:45:58',
                'updated_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'product_id' => 2,
                'attribute_id' => 4,
                'attribute_val' => '4',
                'created_at' => '2022-08-02 17:45:58',
                'updated_at' => NULL,
            ),
        ));


    }
}
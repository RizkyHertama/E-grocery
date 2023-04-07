<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                "id" => 1,
                "item_name" => "Vegetable 1",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "100000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 2,
                "item_name" => "Vegetable 2",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "120000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 3,
                "item_name" => "Vegetable 3",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "130000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 4,
                "item_name" => "Vegetable 4",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "140000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 5,
                "item_name" => "Vegetable 5",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "150000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 6,
                "item_name" => "Vegetable 6",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "160000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 7,
                "item_name" => "Vegetable 7",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "170000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 8,
                "item_name" => "Vegetable 8",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "180000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 9,
                "item_name" => "Vegetable 9",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "190000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 10,
                "item_name" => "Vegetable 10",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "200000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 11,
                "item_name" => "Vegetable 11",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "210000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
            [
                "id" => 12,
                "item_name" => "Vegetable 12",
                "item_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "item_price" => "220000",
                "item_image" => "https://img.freepik.com/premium-vector/fresh-vegetables_267448-99.jpg?w=2000"
            ],
        ]);

    }
}

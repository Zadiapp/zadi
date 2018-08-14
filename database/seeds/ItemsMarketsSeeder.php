<?php

use Illuminate\Database\Seeder;

class ItemsMarketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items_markets')->insert([
            [
                'market_id' => '1',
                'item_id' => '1',
                'popular' => '1',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '2',
                'popular' => '0',
                'price' => '400',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '3',
                'popular' => '1',
                'price' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '4',
                'popular' => '0',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '5',
                'popular' => '0',
                'price' => '90',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '6',
                'popular' => '1',
                'price' => '30',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '7',
                'popular' => '1',
                'price' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '8',
                'popular' => '0',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '9',
                'popular' => '1',
                'price' => '38',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'item_id' => '10',
                'popular' => '0',
                'price' => '33',
                'status' => Config::get('constants.categoryStatus.active')
            ],

            [
                'market_id' => '2',
                'item_id' => '1',
                'popular' => '1',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '2',
                'popular' => '0',
                'price' => '400',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '3',
                'popular' => '1',
                'price' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '4',
                'popular' => '0',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '5',
                'popular' => '0',
                'price' => '90',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '6',
                'popular' => '1',
                'price' => '30',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '7',
                'popular' => '1',
                'price' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '8',
                'popular' => '0',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '9',
                'popular' => '1',
                'price' => '38',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'item_id' => '10',
                'popular' => '0',
                'price' => '33',
                'status' => Config::get('constants.categoryStatus.active')
            ],


            [
                'market_id' => '3',
                'item_id' => '1',
                'popular' => '1',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '2',
                'popular' => '0',
                'price' => '400',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '3',
                'popular' => '1',
                'price' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '4',
                'popular' => '0',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '5',
                'popular' => '0',
                'price' => '90',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '6',
                'popular' => '1',
                'price' => '30',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '7',
                'popular' => '1',
                'price' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '8',
                'popular' => '0',
                'price' => '300',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '9',
                'popular' => '1',
                'price' => '38',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'item_id' => '10',
                'popular' => '0',
                'price' => '33',
                'status' => Config::get('constants.categoryStatus.active')
            ],
        ]);
    }
}

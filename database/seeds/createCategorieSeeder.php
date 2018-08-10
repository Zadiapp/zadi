<?php

use Illuminate\Database\Seeder;

class CreateCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Beverages',
                'name_ar' => 'مشروبات غازبه',
                'description' => 'BeveragesBeveragesBeveragesBeveragesBeveragesBeverages',
                'description_ar' => 'غازبهغازبهغازبهغازبهغازبهغازبهغازبهغازبه',
                'image' => 'beverages.jpg',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'laundry',
                'name_ar' => 'منطفات',
                'description' => 'laundrylaundrylaundrylaundrylaundrylaundrylaundrylaundrylaundry',
                'description_ar' => 'منطفاتمنطفاتمنطفاتمنطفاتمنطفاتمنطفاتمنطفاتمنطفات',
                'image' => 'laundry.jpg',
                'status' => Config::get('constants.categoryStatus.active')
              
            ],
            [
                'name' => 'Rice & Pasta',
                'name_ar' => 'فطار',
                'description' => 'Breakfast & Cereals',
                'description_ar' => 'فطار',
                'image' => 'breakfast.jpg',
                'status' => Config::get('constants.categoryStatus.active')
              
            ],

            [
                'name' => 'Breakfast & Cereals',
                'name_ar' => 'الارز و المكروته',
                'description' => 'Breakfast & Cereals',
                'description_ar' => 'لارز و المكروته',
                'image' => 'rice.jpg',
                'status' => Config::get('constants.categoryStatus.active')
              
            ],

            [
                'name' => 'Cooking ingredient',
                'name_ar' => ' مستلزومات مطبخ',
                'description' => 'Breakfast & Cereals',
                'description_ar' => ' ستلزومات مطبخ ',
                'image' => 'cooking.jpg',
                'status' => Config::get('constants.categoryStatus.active')
              
            ],
        ]);

        DB::table('categories_markets')->insert([
            [
                'market_id' => '1',
                'category_id' => '1',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'category_id' => '2',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'category_id' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'category_id' => '4',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '1',
                'category_id' => '5',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'category_id' => '1',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'category_id' => '2',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '2',
                'category_id' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'category_id' => '4',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'market_id' => '3',
                'category_id' => '5',
                'status' => Config::get('constants.categoryStatus.active')
            ],
        ]);
    }
}

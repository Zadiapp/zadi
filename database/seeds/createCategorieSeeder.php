<?php

use Illuminate\Database\Seeder;

class createCategorieSeeder extends Seeder
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
        ]);
    }
}

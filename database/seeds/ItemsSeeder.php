<?php

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
        //
        DB::table('items')->insert([
            [
                'name' => 'Pepsi Cola 1 liter - Plastic Bottle, 6 Pieces',
                'name_ar' => ' بيبسي كولا 1 لتر - عبوة بلاستيكية، 6 زجاجات',
                'image' => 'pepsi.jpg',
                'category_id' => '1',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'roasted coffee beans ,espresso',
                'name_ar' => 'حبوب قهوة محمصة , اسبريسو',
                'image' => 'espresso.jpg',
                'category_id' => '1',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Tide Automatic Detergent Downy, 2.5 kg',
                'name_ar' => 'مسحوق غسيل تايد اتوماتيك داوني، 2.5 كجم',
                'image' => 'tide.jpg',
                'category_id' => '2',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Persil For Manual Wash with millions of stain removers, 60 gm',
                'name_ar' => 'مسحوق برسيل للغسيل اليدوى بملايين الحبيبات المزيلة للبقع، 60 جم',
                'image' => 'persil.jpg',
                'category_id' => '2',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Star pasta Small Elbow, 10mm',
                'name_ar' => 'مكرونة هلاليه صغيرة من ستار، 10 مم',
                'image' => 'star_pasta.jpg',
                'category_id' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Persil For Manual Wash with millions of stain removers, 60 gm',
                'name_ar' => 'المطبخ مكرونة اسباجيتي، 400 جرام',
                'image' => 'elmatbakh.jpg',
                'category_id' => '3',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Class A Organic Bio Oat Flakes - 500 Gm',
                'name_ar' => 'رقائق شوفان بايو اورجانيك من كلاس ايه - 500 جم',
                'image' => 'organic_bio.jpg',
                'category_id' => '4',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Holw El Sham Starch Flour - 150 gm',
                'name_ar' => 'شا من حلو الشام - 150 جم',
                'image' => 'holw.jpg',
                'category_id' => '4',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Rawaby Rawaby Ghee 1.5 Kg',
                'name_ar' => 'سمنة روابى-1.5 كجم',
                'image' => 'rawaby.jpg',
                'category_id' => '5',
                'status' => Config::get('constants.categoryStatus.active')
            ],
            [
                'name' => 'Asil Sunflower Oil, 2.25L',
                'name_ar' => 'زيت عباد الشمس أصيل, 2.25 لتر',
                'image' => 'asil.jpg',
                'category_id' => '5',
                'status' => Config::get('constants.categoryStatus.active')
            ],
        ]);

    }
}

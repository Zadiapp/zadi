<?php

use Illuminate\Database\Seeder;

class SizeTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size_types')->insert([
            [
                'title' => 'Kilogram',
                'title_ar' => 'kg',
                'unit' => 'Kilogram',
                'unit_ar' => 'kg'                
            ],
            [
                'title' => 'Gram',
                'title_ar' => 'g',
                'unit' => 'Gram',
                'unit_ar' => 'g'                
            ],
            [
                'title' => 'Pound',
                'title_ar' => 'lb',
                'unit' => 'Pound',
                'unit_ar' => 'lb'                
            ],
            [
                'title' => 'Litter',
                'title_ar' => 'Litter',
                'unit' => 'lt',
                'unit_ar' => 'lt'                
            ],
            [
                'title' => 'Millimetre',
                'title_ar' => 'Millimetre',
                'unit' => 'mm',
                'unit_ar' => 'mm'                
            ],
        ]);
    }
}

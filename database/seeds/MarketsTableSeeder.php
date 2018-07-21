<?php

use Illuminate\Database\Seeder;

class MarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('markets')->insert([
            [
                'name' => 'Metro Market',
                'opening_hour' => '10:00 AM - 12:00 AM',
                'delivery_speed' => '45 minutes',
                'accuracy' => '4.4',
                'min_charge' => '100',
                'mobile' => '010838365647',
                'phone' => '03 4690134',
                'address' => 'El Guish Rd.، SAN STEFANO، Qism El-Raml, Alexandria Governorate',
                'location' => DB::raw('POINT(31.247011, 29.969717)'),
                'email' => 'sales@metro.com'
            ],
            [
                'name' => 'Metro Market',
                'opening_hour' => '10:00 AM - 12:00 AM',
                'delivery_speed' => '45 minutes',
                'accuracy' => '4.4',
                'min_charge' => '100',
                'mobile' => '010838365649',
                'phone' => '03 46901348',
                'address' => '45 Albert Al Awal, Ezbet Saad, Qism Sidi Gabir, Alexandria Governorate',
                'location' => DB::raw('POINT(31.214838, 29.939324)'),
                'email' => 'sales@metro.com'
            ],
            [
                'name' => 'Kheir Zaman',
                'opening_hour' => '10:00 AM - 12:00 AM',
                'delivery_speed' => '45 minutes',
                'accuracy' => '4.4',
                'min_charge' => '100',
                'mobile' => '010838365697',
                'phone' => '03 46901340',
                'address' => 'El-Nasr, Huckstep, Qism El-Nozha, Cairo Governorate',
                'location' => DB::raw('POINT(30.129615, 31.372608)'),
                'email' => 'sales@kheir-zaman.com'
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcements')->insert([
            [
                'text' => 'Offer 30%',
                'market_id' => 1,
                'status' => Config::get('constants.announcementStatus.active')
            ],
            [
                'text' => 'Offer 40%',
                'market_id' => 2,
                'status' => Config::get('constants.announcementStatus.active')
            ],
            [
                'text' => 'روض كارفور هايبر مصر من 23 يوليو حتى الأحد 5 أغسطس ',
                'market_id' => 3,
                'status' => Config::get('constants.announcementStatus.active')
            ],
        ]);
    }
}

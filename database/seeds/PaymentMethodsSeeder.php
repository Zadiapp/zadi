<?php

use Illuminate\Database\Seeder;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('market_payment_methods')->insert([
            [
                'market_id' => '1',
                'payment_method_id' => '1',
            ],
            [
                'market_id' => '1',
                'payment_method_id' => '2',
            ],
            [
                'market_id' => '2',
                'payment_method_id' => '2',
            ],
        ]);
    }
}

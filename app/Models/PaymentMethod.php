<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'market_payment_methods';

    function getPaymentMethodIdAttribute($value) {
        if(isset(\Config::get('constants.paymentMethods')[$value])) {
           return \Config::get('constants.paymentMethods')[$value];
        }
        
        return NULL;
    }
}

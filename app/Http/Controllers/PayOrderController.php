<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\billing\PaymentGateway;

class PayOrderController extends Controller
{
    public function store(PaymentGateway $payment){

        // $payment = new PaymentGateway('usd');
        dd($payment->charge(50));
    }
}

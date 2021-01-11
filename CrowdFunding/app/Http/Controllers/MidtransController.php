<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans;

class MidtransController extends Controller
{
    public function generate(Request $request)
    {
        Midtrans\Config::$serverKey = config('app.midtrans.server_key');
        Midtrans\Config::$isProduction = false;
        Midtrans\Config::$isSanitized = true;
        Midtrans\Config::$is3ds = true;

        $midtrans_transaction = Midtrans\Snap::createTransaction($request->data);

        return response()->json([
            'response_code' => '00',
            'response_msg' => 'success',
            'data' => $midtrans_transaction
        ]);
    }
}

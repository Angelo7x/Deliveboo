<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;
use App\Food;

class OrderController extends Controller
{
 public function generate(Request $request, Gateway $gateway){
 $token = $gateway->clientToken()->generate();
        
        $data = [
            'success' => true,
            'token' => $token
        ];
        
        return response()->json($data,200);
 }

 public function makePayment(OrderRequest $request,Gateway $gateway){

    // $food = Food::find($request->food);
    $result = $gateway->transaction()->sale([
        'amount' =>  $request->amount,
        'paymentMethodNonce' => $request->token,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if($result->success){
        $data = [
            'success' => true,
            'message' => "Transazione eseguita con Successo!"
        ];
        return response()->json($data,200);
    }else{
        $data = [
            'success' => false,
            'message' => "Transazione Fallita!!"
        ];
        return response()->json($data,401);
    }
}
 
}

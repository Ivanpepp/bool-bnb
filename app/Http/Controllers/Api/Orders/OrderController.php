<?php

namespace App\Http\Controllers\Api\Orders;
use App\Http\Requests\Oreders\OrderRequest;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function generate(Request $request,Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'success'=>true,
            'token' => $token
        ];
        return response()->json($data,200);
    }

    public function makePayment(OrderRequest $request,Gateway $gateway){

        $sponsor = Sponsorship::find($request->sponsor);


        $result = $gateway->transaction()->sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => $request->token,
            'options'=>[
                'submitForSettlement' => true
            ]
        ]);
        if($result->success){
            $data = [
                'success'=>true,
                'message' => 'transazione eseguita con successo'
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success'=>false,
                'message' => 'transazione fallita malamente'
            ];
            return response()->json($data,401);
        }
        return 'payment';
    }
}

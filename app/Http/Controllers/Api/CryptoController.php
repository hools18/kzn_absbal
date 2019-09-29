<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserInterface\Contract;
use App\Models\UserInterface\Notice;
use App\Models\UserInterface\Operation;
use App\Models\UserInterface\PublicKey;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function getStatusNotice(Request $request)
    {
        $operation = Operation::find($request->operation_id);

        if (!empty($operation->confirmation_time)) {
            $message = $operation->rejection_reason;
            if (!empty($message)) {
                return response()->json([
                    'status' => 0,
                    'message' => $operation->rejection_reason,
                    'content' => []
                ]);
            }
            return response()->json([
                'status' => 1,
                'message' => 'Успешно подписано',
                'content' => $operation->crypto_data
            ]);
        }
        return response()->json([
            'status' => 0,
            'message' => 'Заявка обрабатывается',
            'content' => []
        ]);
    }

    public function sendDataToCrypt(Request $request)
    {
        $user = $request->user();
        $data = $request->data;
        $private_key = PublicKey::where('hash_key', $request->public_key)->first()->key_id;


        $contract = Contract::create([
            'external_id' => 0,
            'text' => $data
        ]);

        $operation = Operation::create([
            'external_id' => 0,
            'user_id' => $user->id,
            'key_id' => $private_key,
            'contract_id' => $contract->id,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Данные получены',
            'content' => []
        ]);
    }
}

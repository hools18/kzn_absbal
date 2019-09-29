<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Crypto\Crypt;
use App\Models\UserInterface\Contract;
use App\Models\UserInterface\Document;
use App\Models\UserInterface\Notice;
use App\Models\UserInterface\Operation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function getNewNotice(Request $request)
    {
        $user = $request->user();
        if ($user->operations->where('confirmation_time', null)->isNotEmpty()) {
            $operations_not_check = $user->operations->where('confirmation_time', null);
            $operations_not_check = $operations_not_check->map(function ($operation) {
                return [
                    'operation_id' => $operation->id,
                    'contract_id' => $operation->contract_id,
                    'created_at' => $operation->created_at,
                ];
            });
            return response()->json([
                'status' => 1,
                'message' => 'Есть операции в очереди на подтверждение',
                'content' => $operations_not_check
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Операций в очереди нет',
            'content' => []
        ]);
    }

    public function setStatusOperation(Request $request)
    {
        $operation = Operation::find($request->operation_id);
        $operation->rejection_reason = $request->rejection_reason ?? null;
        $operation->confirmation_time = Carbon::now();
        $operation->save();

        $notice = Notice::where('operation_id', $operation->id)->first();
        $notice->type = 'success';
        $notice->save();

        if(empty($request->rejection_reason)){
            $document_text = Contract::find($operation->contract_id)->text;
            $crypt_data = Crypt::encodeData($operation->key_id, $document_text);
            $operation->crypto_data = $crypt_data;
            $operation->save();
        }

        $user = $request->user();

        DB::table('operation_user_key')->insert(
            ['operation_id' => $operation->id, 'key_id' => $operation->key_id, 'user_id' => $user->id]
        );


        return response()->json([
            'status' => 1,
            'message' => 'Ответ принят',
            'content' => []
        ]);
    }
}

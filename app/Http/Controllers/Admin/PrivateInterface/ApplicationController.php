<?php

namespace App\Http\Controllers\Admin\PrivateInterface;
use App\Http\Controllers\Controller;
use App\Models\Crypto\Crypt;
use App\Models\PrivateInterface\Application;
use App\Models\UserInterface\Key;
use App\Models\UserInterface\Operation;
use App\Models\UserInterface\PublicKey;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $data = [
            'applications' => Application::where('is_check', false)->orderBy('id', 'desc')->get(),
        ];

        return view('admin.private_interfase.application.index', $data);
    }

    public function accept(Request $request)
    {

        $application = Application::find($request->app_id);
        $application->is_check = true;
        $application->save();

        ApplicationDecision::create([
            'user_id' => 1,  // TODO - Здесь заметить на id авторизованного регистратора
            'client_id' => $application->client_id,
            'rejection_reason' => null,
        ]);
        $keys = Crypt::create_keys();
        $key = Key::create([
            'user_id' =>  $application->client_id,
            'type' => 'none',
            'time_expired' => Carbon::now()->addYear(),
            'hash_key' => $keys['private'],
            'is_active' => true,
            'inactive_time' => null,
        ]);
        PublicKey::create([
            'key_id' => $key->id,
            'hash_key' => $keys['public']
        ]);

        return response()->json([
            'status' => '1',
            'message' => 'Успешно подтверждено'
        ]);
    }

    public function reject(Request $request)
    {
        $application = Application::find($request->app_id);
        $application->is_check = true;
        $application->save();

        ApplicationDecision::create([
            'user_id' => 1,  // TODO - Здесь заметить на id авторизованного регистратора
            'client_id' => $application->client_id,
            'rejection_reason' =>  $request->reason_reject,
        ]);

        return response()->json([
            'status' => '0',
            'message' => 'Запрос отклонен'
        ]);
    }
}

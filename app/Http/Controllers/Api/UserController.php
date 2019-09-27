<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserInterface\Document;
use App\Models\UserInterface\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create_user(Request $request)
    {
        if (!$request->name && !$request->device_id) {
            return response()->json([
                'status' => 0,
                'message' => 'Заполните имя и device_id',
                'user_id' => 0,
            ]);
        }
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'birthday' => $request->birthday,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->phone,
            'biometrics' => $request->biometrics,
            'confirmation_date' => $request->confirmation_date,
            'device_id' => $request->device_id,
        ]);

        $document = Document::create([
            'user_id' => $user->id,
            'series' => $request->series,
            'number' => $request->number,
            'issuing_authority' => $request->issuing_authority,
            'date_of_issue' => $request->date_of_issue,
            'time_expired' => $request->time_expired,
            'type' => 'passport',
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Пользователь успешно создан',
            'user_id' => $user->id,
            'list_date' => [
                '2019-07-08 14:00:00', '2019-07-08 15:00:00', '2019-07-08 16:00:00'
            ]
        ]);
    }

    public function update_confirmation_date(Request $request)
    {
        $user = User::find($request->user_id);
        $user->confirmation_date = $request->confirmation_date;
        $user->save();

        return response()->json([
            ''
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Api\Auth\RegisterFormRequest;

use App\Http\Controllers\Controller;
use App\Models\UserInterface\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterFormRequest $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'email', 'device_id'),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'Вы успешно зарегистрированы используйте ваш email и пароль для входа'
        ], 200);
    }
}

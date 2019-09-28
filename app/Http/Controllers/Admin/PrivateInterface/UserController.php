<?php

namespace App\Http\Controllers\Admin\PrivateInterface;

use App\Http\Controllers\Controller;
use App\Models\PrivateInterface\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
        ];

        return view('admin.private_interfase.user.index', $data);
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'surname',
            'patronymic',
            'birthday',
            'login',
            'password',
            'email',
            'phone',
            'biometrics',
            'workplace',
            'unit_number',
        ]);
        $data = [
            'users' => User::all(),
        ];

        return view('admin.private_interfase.user.index', $data);
    }
}

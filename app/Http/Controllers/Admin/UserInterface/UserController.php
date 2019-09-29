<?php

namespace App\Http\Controllers\Admin\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\UserInterface\User;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
        ];

        return view('admin.user_interface.user.index', $data);
    }
}

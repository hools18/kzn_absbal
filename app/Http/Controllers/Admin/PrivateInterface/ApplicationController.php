<?php

namespace App\Http\Controllers\Admin\PrivateInterface;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function applications()
    {
        return view('admin.private_interfase.application.index');
    }

    public function users()
    {
        return view('admin.private_interfase.user.index');
    }
}

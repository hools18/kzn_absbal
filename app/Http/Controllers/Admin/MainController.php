<?php
namespace App\Http\Controllers\Admin;

use App\Events\Test;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.main.index');
    }

    public function test()
    {
        Test::dispatch('Привет Серега!');
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crypto\Crypt;
use App\Models\PrivateInterface\Application;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.main.index');
    }

    public function test()
    {

        $keys = Crypt::create_keys();

        dd($keys);
//        $application = Application::find(2);
////        $url_photo = 'https://absbal.tk/image/photo2.jpg';
////        $url_doc = 'https://absbal.tk/image/skan2.jpg';
////
////        $application->addMediaFromUrl($url_photo)->toMediaCollection('photo_client');
////        $application->addMediaFromUrl($url_doc)->toMediaCollection('photo_document');
//        dd($application->getMedia('photo_client'));
    }
}

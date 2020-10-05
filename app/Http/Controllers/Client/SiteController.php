<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function home()
    {
        return view('client.home');
    }
}

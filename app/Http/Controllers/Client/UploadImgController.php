<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImgController extends Controller
{
    public function uploadImg()
    {
        return view('client.upload-file');
    }

    public function handleUploadImg(Request $request)
    {
        dd($request->input('files'));
    }
}

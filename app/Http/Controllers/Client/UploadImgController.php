<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadImgController extends Controller
{
    public function uploadImg()
    {
        $files = array_map(function ($filename) {
            return Storage::url(substr($filename, strrpos($filename, '/') + 1));
        }, Storage::disk('public')->files('images/files'));

//        dd($files);

        return view('client.upload-file', ['files' => $files]);
    }

    public function handleUploadImg(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $item) {
            if (strpos($key, 'file-') !== false) {
                $fileName = microtime() . '.' . $item->getClientOriginalExtension();

                $fileName = str_replace(' ', '-', $fileName);

                $img = Image::make($item->getRealPath());

                $img->stream(); // <-- Key point

                Storage::disk('public')->put('images/files/'.$fileName, $img, 'public');
            }
        }

        return true;
    }
}

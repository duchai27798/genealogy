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
        return view('client.upload-file', ['files' => Storage::files('public/images/files')]);
    }

    public function handleUploadImg(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $item) {
            if (strpos($key, 'file-') !== false) {
                $fileName   = microtime() . '.' . $item->getClientOriginalExtension();

                $img = Image::make($item->getRealPath());

                $img->stream(); // <-- Key point

                Storage::disk('public')->put('images/files/'.$fileName, $img, 'public');
            }
        }

        return true;
    }
}

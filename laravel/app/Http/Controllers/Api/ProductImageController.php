<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImages\DeleteRequest;
use App\Http\Requests\ProductImages\StoreRequest;
use App\Models\ImageProduct;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function store(StoreRequest $request)
    {
        $images = $request->file('images'); // all images
        foreach ($images as $image) {
            $objectImage = Storage::disk('s3')->put('image', $image);
            $url = Storage::disk('s3')->url($objectImage);
            $saveImage = [
                'path' => $url,
                'main' => 1,
                'product_id' => $request['product_id']
            ];
            ImageProduct::create($saveImage);
        }
    }

    public function destroy(DeleteRequest $id)
    {
      return ImageProduct::destroy($id['id']);
    }
}

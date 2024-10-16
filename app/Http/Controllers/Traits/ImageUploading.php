<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Http\Request;
trait ImageUploading {
    public function storeImage(Request $request) {

        $path = storage_path('tmp/uploads');

        if(!file_exists($path)){
            mkdir($path,0775,true);
        }
        $file = $request->file('file');

        $name = uniqid() . '-' . trim($file->getClientOriginalName());

        $file->move($path, $name);
        
        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadApiController extends Controller
{
    public function apiRecipeStore(Request $request, $id)
    {
           // dd($request->file('bla'));
           // dd($request->all());
        if(!$request->hasFile('file'))
            return response()->json([
                'error' => 'No File Uploaded'
            ]);
        // $test = Recipe::find($id);
        // dd($id);
            $image = $request->file('file');

            $fileName = $image->getClientOriginalName();

            $destination = public_path('images/');
            $uniqid = uniqid();

            #$mainFileName = $uniqid . '.' . $image->getClientOriginalExtension();
            $mainFileName = $image->getClientOriginalName();
            // return $mainFileName;
            $thumbFileName = $uniqid . '_thumb.' . $image->getClientOriginalExtension();

            $mainImage = Image::make($image)
                    // ->resize(800, null, function ($constraint) {
                    //     $constraint->aspectRatio();
                    //     $constraint->upsize();
                    // })
                    ->save($destination . $mainFileName);

            $size = $mainImage->filesize();

            $thumbImage = Image::make($image)
                    ->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save($destination . $thumbFileName);

            $thumbSize = $thumbImage->filesize();
                // $recipe = Recipe::findOrFail($id);
                // $recipe->uploads()->create([
                //     'filename' => $mainFileName,
                //     'size' => $size,
                //     'recipe_id' => $id
                // ]);

                $this->handleRequest($id, $mainFileName, $size, $thumbFileName, $thumbSize);
                // $this->handleRequest($id, $thumbFileName, $thumbSize);

        return response()->json([
            'success' => 'File Uploaded'
        ]);
     }

     private function handleRequest($id, $fileName, $size, $thumbfileName, $thumbsize)
    {
        $recipe = $recipe = Recipe::findOrFail($id);
        $recipe->uploads()->create([
                    'filename' => $fileName,
                    'size' => $size,
                    'thumb_filename' => $thumbfileName,
                    'thumb_size' => $thumbsize,
                    'recipe_id' => $id
                ]);

        // $data = $request->all();
        // $data['slug'] = strtolower(str_slug($request->slug, ('-')));

        // return $data;
    }
}

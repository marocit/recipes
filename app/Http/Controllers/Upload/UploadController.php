<?php

namespace App\Http\Controllers\Upload;

use App\Recipe;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Recipe $recipe, Request $request)
    {
        dd($request->file('file'));
        $uploadFile = $request->file('file');

        $upload = $this->storeUpload($recipe, $uploadFile);

        Storage::disk('local')->putFileAs(
            'files/' . $recipe->slug,
            $uploadFile,
            $this->generateFileName($recipe, $uploadFile)
        );

        return response()->json([
            'id' => 1
        ]);

    }



    protected function storeUpload(Recipe $recipe, UploadedFile $uploadedFile)
    {
        $upload = new Upload;

        $upload->fill([
            'filename' => $this->generateFileName($recipe, $uploadedFile),
            'size' => $uploadedFile->getSize(),
        ]);

        $upload->recipe()->associate($recipe);

        $upload->save();

        return $upload;
    }

    protected function generateFileName(Recipe $recipe, UploadedFile $uploadedfile)
    {
        $fileName = $recipe->slug . '_' . $uploadedfile->getClientOriginalName();
        // return $uploadedfile->getClientOriginalName();
        return $fileName;
    }
}

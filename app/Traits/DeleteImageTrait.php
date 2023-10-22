<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait DeleteImageTrait
{

    public function deleteImage($image, $folderName)
    {
        $imagePath = public_path('images/' . $folderName . '/' . $image);

        if (File::exists($imagePath)) {

            File::delete($imagePath);
            return true;
        }
        return false;
    }
}

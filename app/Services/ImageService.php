<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;


class ImageService
{
//画像とフォルダ名が渡される
  public static function upload($imageFile){
    //dd($imageFile['image']);
    if(is_array($imageFile))
    {
      $file = $imageFile['image'];
    } else {
      $file = $imageFile;
    }

    $fileName = uniqid(rand().'_');
    $extension = $file->extension();
    $fileNameToStore = $fileName. '.' . $extension;
    $resizedImage = InterventionImage::make($file)->resize(400, 400)->encode();
    Storage::put('public/images/' . $fileNameToStore, $resizedImage );

    return $fileNameToStore;
  }
}
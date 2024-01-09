<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageUpload {

    protected function generalUploadImage($image,$width,$height){
        $name        = $this->folder_name.'/'.uniqid().$image->getClientOriginalName();

        if (!is_dir($this->image_path.$this->folder_name)) {
            File::makeDirectory($this->image_path.$this->folder_name, 0777, true);
        }
        $status = Image::make($image->getRealPath())->orientate();

        if($width && $height){
            $status = $status->fit($width,$height);
        }

        $status = $status->save($this->image_path.$name);

        if ($thumbnailDimensions = config('thumbnail_dimension.'.$this->folder_name)){
            $thumb_name     = getThumbImageName($name);
            Image::make($image->getRealPath())->fit($thumbnailDimensions['width'], $thumbnailDimensions['height'])->orientate()->save($this->image_path.$thumb_name);
        }

        return ['status'=>$status, 'name'=>$name];
    }

    protected function uploadImage($image,$width=null,$height=null)
    {
        $result = $this->generalUploadImage($image,$width,$height);
        if ($result['status']) {
            return $result['name'];
        }
    }

    protected function updateImage($image,$image_name=null,$width=null,$height=null)
    {

        $result = $this->generalUploadImage($image,$width,$height);
        if ($result['status']) {

            if (!empty($image_name)){
                $this->deleteImage($image_name);
            }

            return $result['name'];
        }
    }

    protected function deleteImage($image)
    {
        $thumb_name = getThumbImageName($image);

        if (!empty($image) && file_exists($this->image_path.$image)){
            @unlink($this->image_path.DIRECTORY_SEPARATOR.$image);
        }

        if (!empty($thumb_name) && file_exists($this->image_path.$thumb_name)){
            @unlink($this->image_path.$thumb_name);
        }
    }

    protected function deleteGalleryImage($image,$folder_name)
    {
        $image_path = $folder_name.DIRECTORY_SEPARATOR.$image;
        if (!empty($image) && file_exists($this->image_path.$image_path)){
            @unlink($this->image_path.DIRECTORY_SEPARATOR.$image_path);
        }
    }

    public function uploadFile($file)
    {
        // Generate a unique file name using the original file name and folder
        $name = $this->folder_name.'/'.uniqid().$file->getClientOriginalName();

        // Check if the directory exists, if not, create it
        if (!is_dir($this->file_path.$this->folder_name)) {
            File::makeDirectory($this->file_path.$this->folder_name, 0777, true);
        }

//        // Check if the file already exists, then delete it


        // Store the uploaded file in the specified directory
        $status = $file->move($this->file_path . $this->folder_name, $name);

        if ($status){
            return $name;
        }
    }


    public function deleteFile($file){
        $existingFilePath = $this->file_path . $file;

        if (File::exists($existingFilePath)) {
            File::delete($existingFilePath);
        }

    }





}

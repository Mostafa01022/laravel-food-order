<?php

namespace App\Traits;

use Illuminate\Http\Request;


trait UploadImageTrait 
{
    public function UploadImage(Request $request , $inputName, $folderName)
    {
        $path = $request->file($inputName)->store($folderName , 'images_path');
        return $path ;
    }
}

class a{
    private $age;
    protected $salary;
    public $name;
    public function setAge(int $age){
        $this->age = $age;
    }
}
 
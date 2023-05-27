<?php


namespace App\Exceptions;

use Exception;
use Illuminate\Http\UploadedFile;

class ErrorUploadException extends Exception{
    public static function create(UploadedFile $file)
    {
        return new static("Can't upload {$file->getClientOriginalName()} file");
    }
}

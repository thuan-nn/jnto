<?php

namespace App\Services;

use App\Enums\ImageTypeEnum;
use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadFileService
{
    /**
     * @param      $uploadedFile
     * @param null $disk
     * @param      $type
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null
     */
    public function execute($uploadedFile, $disk = null, $type)
    {
        if (is_array($uploadedFile)) {
            return collect($uploadedFile)
                ->filter(function ($file) {
                    return $file instanceof UploadedFile;
                })
                ->map(function ($file) use ($disk, $type) {
                    return $this->upload($file, $disk, $type);
                });
        }
        if ($uploadedFile instanceof UploadedFile) {
            return $this->upload($uploadedFile, $disk, $type);
        }

        return null;
    }

    /**
     * @param UploadedFile $uploadedFile
     * @param              $disk
     * @param              $type
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null
     */
    public function upload(UploadedFile $uploadedFile, $disk, $type)
    {
        if ($type === ImageTypeEnum::BANNER) {
            $fileNameReduce = $this->getNameUpload($uploadedFile);
            $path = today()->format('Y-m-d');
            $fileReduce = Image::make($uploadedFile->getRealPath());
            if(!is_dir(storage_path('app/public/' . $path))) {
                mkdir(storage_path('app/public/' . $path), 0777, true);
            }
            $fileReduce->save(storage_path('app/public/' . $path . '/' . $fileNameReduce), 60);

            $attribute = [
                'name'        => $fileReduce->basename,
                'upload_name' => $uploadedFile->getClientOriginalName(),
                'disk'        => $disk ?: config('filesystems.default'),
                'mime_type'   => $fileReduce->mime(),
                'size'        => $fileReduce->filesize(),
            ];

            return File::query()->create(array_merge($attribute, ['path' => "{$path}/{$fileNameReduce}"]));

        } else {
            $attribute = [
                'name'        => sprintf('%s_%s.%s', now()->timestamp, Str::random(5), $uploadedFile->guessExtension()),
                'upload_name' => $uploadedFile->getClientOriginalName(),
                'disk'        => $disk ? $disk : config('filesystems.default'),
                'mime_type'   => $uploadedFile->getClientMimeType(),
                'size'        => $uploadedFile->getSize(),
            ];

            if ($path = $uploadedFile->storeAs(today()->format('Y-m-d'), $attribute['name'], $attribute)) {
                return File::query()->create(array_merge($attribute, ['path' => $path]));
            }
        }

        return null;
    }

    /**
     * @param \Illuminate\Http\UploadedFile $uploadedFile
     * @param                               $width
     * @param                               $height
     * @param null                          $disk
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null
     */
    public function resize(UploadedFile $uploadedFile, $width, $height, $disk = null)
    {
        $fileNameReduce = $this->getNameUpload($uploadedFile);

        $path = today()->format('Y-m-d');
        $fileToResize = Image::make($uploadedFile->getRealPath())->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $fileToResize->orientate();

        if(!is_dir(storage_path('app/public/' . $path))) {
            mkdir(storage_path('app/public/' . $path), 0777, true);
        }

        // If file size greater than 400KB will be decrease the quality to 60% and on default 90% if less than 400KB
        $quality = $fileToResize->filesize() && $fileToResize->filesize() > 400000 ? 60 : null;
        $fileToResize->save(storage_path('app/public/' . $path . '/' . $fileNameReduce), $quality);

        $attribute = [
            'name'        => $fileToResize->basename,
            'upload_name' => $uploadedFile->getClientOriginalName(),
            'disk'        => $disk ? $disk : config('filesystems.default'),
            'mime_type'   => $fileToResize->mime(),
            'size'        => $fileToResize->filesize(),
        ];

        return File::query()->create(array_merge($attribute, ['path' => "{$path}/{$fileNameReduce}"]));
    }

    /**
     * @param $uploadedFile
     *
     * @return string
     */
    private function getNameUpload($uploadedFile): string
    {
        return sprintf('%s_%s.%s', now()->timestamp, Str::random(5), $uploadedFile->guessExtension());
    }
}

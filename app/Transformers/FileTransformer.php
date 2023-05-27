<?php

namespace App\Transformers;

use App\Models\File;
use Flugg\Responder\Transformers\Transformer;

class FileTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * @param File $file
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function transform(File $file)
    {
        return [
            'id'                => (string) $file->id,
            'name'              => (string) $file->name,
            'upload_name'       => (string) $file->upload_name,
            'mime_type'         => (string) $file->mime_type,
            'size'              => (int)    $file->size,
            'path'              => (string) $file->path,
            'url'               => (string) getFileUrl($file->path),
            'file_type'         => (string) optional($file->pivot)->file_type,
            'created_at'        => (string) $file->created_at,
            'updated_at'        => (string) $file->updated_at,
        ];
    }
}

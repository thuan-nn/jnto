<?php

use Flugg\Responder\Responder;
use Illuminate\Support\Facades\Storage;

if (! function_exists('getFileUrl')) {
    /**
     *  Get the fully URL with current Base_url on default storage
     *
     * @param $path
     * @return string|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    function getFileUrl($path)
    {
        return Storage::url($path) ?: '';
    }
}


if (! function_exists('responderWithRelations')) {
    /**
     * @param array $data
     * @param $transformer
     * @param array $relations
     * @return mixed
     */
    function responderWithRelations($data, $transformer, $relations = [])
    {
        return  app(Responder::class)->success($data, $transformer)->with($relations)->respond()->getData()->data;
    }
}
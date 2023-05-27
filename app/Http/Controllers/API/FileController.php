<?php

namespace App\Http\Controllers\API;


use App\Enums\ImageTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use App\Services\UploadFileService;
use App\Transformers\FileTransformer;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{

    /**
     * @param UploadFileRequest $uploadFileRequest
     * @param UploadFileService $uploadFileService
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(UploadFileRequest $uploadFileRequest, UploadFileService $uploadFileService)
    {
        DB::beginTransaction();
        try {
            $uploadedFiles = $uploadFileService->execute($uploadFileRequest->file('files'), 'public' , ImageTypeEnum::BANNER);
            DB::commit();
            return $this->httpCreated($uploadedFiles, FileTransformer::class);
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }
}

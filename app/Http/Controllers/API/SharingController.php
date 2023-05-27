<?php

namespace App\Http\Controllers\API;

use App\Actions\CheckSharedAction;
use App\Actions\CreateSharingAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSharingRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SharingController extends Controller
{
    /**
     * @param CreateSharingRequest $createSharingRequest
     * @param CreateSharingAction $createSharingAction
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(CreateSharingRequest $createSharingRequest, CreateSharingAction $createSharingAction)
    {
        DB::beginTransaction();
        try {
            $createSharingAction->execute($createSharingRequest->validated());

            DB::commit();
            return $this->httpCreated();
        } catch (\Exception $exception){

            DB::rollBack();
            return $this->httpBadRequest([
                'code'   => JsonResponse::HTTP_BAD_REQUEST,
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * @param \App\Http\Requests\CreateSharingRequest $createSharingRequest
     * @param \App\Actions\CheckSharedAction $checkSharedAction
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function check (CreateSharingRequest $createSharingRequest, CheckSharedAction $checkSharedAction){
        return $this->httpResponse([
            'is_shared' => $checkSharedAction->execute($createSharingRequest->validated())
        ]);
    }
}

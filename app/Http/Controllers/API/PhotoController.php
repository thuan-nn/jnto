<?php

namespace App\Http\Controllers\API;

use App\Actions\CreatePhotoAction;
use App\Filters\PhotoFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhotoRequest;
use App\Models\Photo;
use App\Sorts\PhotoSort;
use App\Transformers\PhotoTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * @param Request     $request
     * @param PhotoFilter $filter
     * @param PhotoSort   $sort
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, PhotoFilter $filter, PhotoSort $sort)
    {
        $photos = Photo::query()->filter($filter)->sortBy($sort)->paginate($this->perPage);

        return $this->httpOK($photos, PhotoTransformer::class);
    }

    /**
     * @param Photo $photo
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Photo $photo)
    {
        return $this->httpOK($photo, PhotoTransformer::class);
    }

    /**
     * @param \App\Http\Requests\CreatePhotoRequest $createPhotoRequest
     * @param \App\Actions\CreatePhotoAction $createPhotoAction
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(CreatePhotoRequest $createPhotoRequest, CreatePhotoAction $createPhotoAction)
    {
        DB::beginTransaction();
        try {
            $createPhotoAction->execute($createPhotoRequest->validated());
            DB::commit();
            return $this->httpCreated();
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param Request $request
     * @param Photo   $photo
     *
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Photo $photo)
    {
        $validator = $request->validate(['is_approved' => 'required|boolean']);

        $photo->update($validator);

        return $this->httpNoContent();
    }

    /**
     * @param Photo $photo
     *
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Photo $photo)
    {
        DB::beginTransaction();
        try {
            $photo->files()->delete();
            $photo->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $this->httpNoContent();
    }
}

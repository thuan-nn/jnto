<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateStoryAction;
use App\Filters\StoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateStoryRequest;
use App\Models\Story;
use App\Sorts\StorySort;
use App\Transformers\StoryTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    /**
     * @param Request $request
     * @param StoryFilter $filter
     * @param StorySort $sort
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, StoryFilter $filter, StorySort $sort)
    {
        $stories = Story::query()->filter($filter)->sortBy($sort)->paginate($this->perPage);

        return $this->httpOK($stories, StoryTransformer::class);
    }

    /**
     * @param Story $story
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Story $story)
    {
        return $this->httpOK($story, StoryTransformer::class);
    }

    /**
     * @param \App\Http\Requests\CreateStoryRequest $createStoryRequest
     * @param \App\Actions\CreateStoryAction $createStoryAction
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(CreateStoryRequest $createStoryRequest, CreateStoryAction $createStoryAction)
    {
        DB::beginTransaction();
        try {
            $createStoryAction->execute($createStoryRequest->validated());
            DB::commit();
            return $this->httpCreated();
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param Request $request
     * @param Story $story
     */
    public function update(Request $request, Story $story)
    {
        $validator = $request->validate(['is_approved' => 'required|boolean']);

        $story->update($validator);

        return $this->httpNoContent();
    }


    /**
     * @param Story $story
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Story $story)
    {
        $story->delete();

        return $this->httpNoContent();
    }
}

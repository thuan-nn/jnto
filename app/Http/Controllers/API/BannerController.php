<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateBannerAction;
use App\Actions\UpdateBannerAction;
use App\Filters\BannerFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Sorts\BannerSort;
use App\Transformers\BannerTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * @param Request      $request
     * @param BannerFilter $filter
     * @param BannerSort   $sort
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, BannerFilter $filter, BannerSort $sort)
    {
        $banners = Banner::query()->filter($filter)->sortBy($sort)->latest()->paginate($this->perPage);

        return $this->httpOK($banners, BannerTransformer::class);
    }

    /**
     * @param CreateBannerRequest $request
     * @param CreateBannerAction  $action
     *
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(CreateBannerRequest $request, CreateBannerAction $action)
    {
        $data = $request->validated();
        $banner = $action->execute($data);

        return $this->httpCreated($banner, BannerTransformer::class);
    }

    /**
     * @param Banner $banner
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Banner $banner)
    {
        return $this->httpOK($banner, BannerTransformer::class);
    }

    /**
     * @param UpdateBannerRequest $request
     * @param UpdateBannerAction  $action
     * @param Banner              $banner
     *
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(UpdateBannerRequest $request, UpdateBannerAction $action, Banner $banner)
    {
        $data = $request->validated();
        $action->execute($data, $banner);

        return $this->httpNoContent();
    }

    /**
     * @param Banner $banner
     *
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Banner $banner)
    {
        DB::beginTransaction();
        try {
            $banner->files()->delete();
            $banner->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $this->httpNoContent();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function total_selected(): \Illuminate\Http\JsonResponse
    {
        $total_selected = Banner::query()->whereIsSelected(true)->get()->count();
        return $this->httpOK(['total_selected' => $total_selected]);
    }
}

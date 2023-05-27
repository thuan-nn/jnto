<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateAdminAction;
use App\Actions\UpdateAdminAction;
use App\Filters\AdminFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Sorts\AdminSort;
use App\Transformers\AdminTransformer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @param AdminFilter $filter
     * @param AdminSort $sort
     *
     * @return \App\Supports\Traits\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, AdminFilter $filter, AdminSort $sort)
    {
        $admin = Admin::query()->filter($filter)->sortBy($sort)->paginate($this->perPage);

        return $this->httpOK($admin, AdminTransformer::class);
    }

    /**
     * @param CreateAdminRequest $createAdminRequest
     * @param CreateAdminAction $createAdminAction
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(CreateAdminRequest $createAdminRequest, CreateAdminAction $createAdminAction)
    {
        $admin = $createAdminAction->execute($createAdminRequest->validated());

        return $this->httpCreated($admin, AdminTransformer::class);
    }

    /**
     * @param Admin $admin
     *
     * @return \App\Supports\Traits\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Admin $admin)
    {
        return $this->httpOK($admin, AdminTransformer::class);
    }

    /**
     * @param UpdateAdminRequest $updateAdminRequest
     * @param Admin $admin
     * @param UpdateAdminAction $updateAdminAction
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function update(UpdateAdminRequest $updateAdminRequest, Admin $admin, UpdateAdminAction $updateAdminAction)
    {
        $updateAdminAction->execute($updateAdminRequest->validated(), $admin);

        return $this->httpNoContent();
    }

    /**
     * @param Admin $admin
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return $this->httpNoContent();
    }
}

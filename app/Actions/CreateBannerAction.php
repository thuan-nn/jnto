<?php


namespace App\Actions;


use App\Models\Banner;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CreateBannerAction
{
    /**
     * @param $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function execute($data)
    {
        DB::beginTransaction();
        $bannerData = Arr::except($data, 'file_id');
        $fileId = Arr::get($data, 'file_id');

        try {
            $banner = Banner::query()->create($bannerData);
            $banner->files()->sync($fileId);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $banner;
    }
}

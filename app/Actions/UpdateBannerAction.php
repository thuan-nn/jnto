<?php


namespace App\Actions;


use App\Models\Banner;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateBannerAction
{
    /**
     * @param        $data
     * @param Banner $banner
     *
     * @throws \Exception
     */
    public function execute($data, Banner $banner)
    {
        DB::beginTransaction();
        $bannerData = Arr::except($data, 'file_id');
        $fileId = Arr::get($data, 'file_id');

        try {
            $banner->update($bannerData);
            if ($fileId) {
                $banner->files()->sync($fileId);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}

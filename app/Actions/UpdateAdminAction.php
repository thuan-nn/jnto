<?php


namespace App\Actions;


use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class UpdateAdminAction {
    /**
     * @param $data
     * @param $admin
     *
     * @throws \Throwable
     */
    public function execute($data, $admin) {
        try {
            DB::beginTransaction();
            $admin->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}

<?php

namespace App\Actions;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class CreateAdminAction
{
    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function execute($data)
    {
        try {
            DB::beginTransaction();

            $admin = Admin::query()->create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $admin;
    }
}

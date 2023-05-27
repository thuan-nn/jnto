<?php

namespace App\Actions;

use App\Jobs\VerifySharingRequestJob;
use App\Services\FacebookService;

class CreateSharingAction
{

    protected $facebook;

    /**
     * CreateSharingAction constructor.
     */
    public function __construct()
    {
        $this->facebook = new FacebookService();
    }

    /**
     * @param $data
     */
    public function execute($data)
    {
        // set shared time
        $data['shared_at'] = now(config('app.timezone'));

        // generate verify job
        VerifySharingRequestJob::dispatch($data)->afterCommit();
    }
}

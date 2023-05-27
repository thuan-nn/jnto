<?php

namespace App\Services;

use Facebook\Facebook;

class FacebookService extends Facebook
{
    /**
     * FacebookService constructor.
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function __construct()
    {
        $config = [
            'app_id' => config('facebook.app_id'),
            'app_secret' => config('facebook.app_secret'),
            'graph_api_version' => config('facebook.graph_api_version')
        ];
        parent::__construct($config);
    }
}

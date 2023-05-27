<?php

namespace App\Actions;

use App\Enums\CampaignRegisterType;
use App\Models\Photo;
use App\Models\Story;

class CheckSharedAction
{
    /**
     * @param $data
     * @return bool
     */
    public function execute($data)
    {
        switch ($data['type']) {
            case CampaignRegisterType::PHOTO:
                $campaign = Photo::query()->whereIsApproved(true)->find($data['campaign_id']);
                break;
            case CampaignRegisterType::STORY:
                $campaign = Story::query()->whereIsApproved(true)->find($data['campaign_id']);
                break;
            default:
                $campaign = null;
                break;
        }

        // Check campaign exist
        if (!$campaign){
            abort(400);
        }

        if ($campaign->sharingCampaignLog()->where('shared_campaign_logs.user_id', $data['user_id'])->exists()){
           return true;
        }
        return false;
    }
}

<?php

namespace App\Jobs;

use App\Enums\CampaignRegisterType;
use App\Models\Photo;
use App\Models\Story;
use App\Services\FacebookService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\JsonResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class VerifySharingRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data, $facebook;

    /**
     * VerifySharingRequestJob constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->facebook = new FacebookService();
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        try {
            switch ($this->data['type']) {
                case CampaignRegisterType::PHOTO:
                    $campaign = Photo::query()->whereIsApproved(true)->find($this->data['campaign_id']);
                    break;
                case CampaignRegisterType::STORY:
                    $campaign = Story::query()->whereIsApproved(true)->find($this->data['campaign_id']);
                    break;
                default:
                    $campaign = null;
                    break;
            }

            // Check campaign exist
            if (!$campaign){
                throw new \Exception(trans('errors.not_found_model_or_userId').' user_id: '. $this->data['user_id'] .' type: '. $this->data['type'] . ' campaign_id: '. $this->data['campaign_id']);
            }
            // Check shared log existed
            if ($campaign->sharingCampaignLog()->where('shared_campaign_logs.user_id', $this->data['user_id'])->exists()){
                throw new \Exception(trans('errors.user_id_existed_in_sharing_log').' user_id: '. $this->data['user_id'] .' type: '. $this->data['type'] . ' campaign_id: '. $this->data['campaign_id']);
            }

            // Call to FB to verify USER ID
            $response = Http::get('https://graph.facebook.com/v10.0/'.$this->data['user_id'].'/picture');

            if ($campaign && $response->status() === JsonResponse::HTTP_OK) {
                $this->data['created_at'] = now();
                $campaign->sharingCampaignLog()->create($this->data);
            } else {
                throw new \Exception(trans('errors.not_found_model_or_userId').' user_id: '. $this->data['user_id'] .' type: '. $this->data['type'] . ' campaign_id: '. $this->data['campaign_id']);
        }
        } catch (\Exception $exception){
            throw $exception;
        }
    }
}

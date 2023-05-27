<?php

namespace App\Actions;

use App\Enums\CampaignRegisterType;
use App\Mail\UserRegistration;
use App\Models\User;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\Mail;

class CreateStoryAction
{
    protected $uploadFiledService;

    /**
     * CreateStoryAction constructor.
     *
     * @param \App\Services\UploadFileService $uploadFileService
     */
    public function __construct(UploadFileService $uploadFileService)
    {
        $this->uploadFiledService = $uploadFileService;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function execute($data)
    {
        $data['campaign_register_type'] = CampaignRegisterType::STORY;
        // Create User
        $user = User::query()->create($data);

        // Create Photo
        $story = $user->story()->create($data);

        // Send mail to user
        $mail = new UserRegistration($user->name, CampaignRegisterType::STORY);
        Mail::to($user->email)->queue($mail
            ->subject('Thư xác nhận tham gia cuộc thi viết “Nhật Bản tôi yêu”')
            ->onQueue('email')->afterCommit());

        return $story;
    }
}

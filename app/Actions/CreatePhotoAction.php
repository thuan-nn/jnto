<?php

namespace App\Actions;

use App\Enums\CampaignRegisterType;
use App\Enums\FileType;
use App\Enums\ImageTypeEnum;
use App\Mail\UserRegistration;
use App\Models\User;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CreatePhotoAction
{
    protected $uploadFiledService;

    /**
     * CreatePhotoAction constructor.
     *
     * @param \App\Services\UploadFileService $uploadFileService
     */
    public function __construct(UploadFileService $uploadFileService)
    {
        $this->uploadFiledService = $uploadFileService;
    }

    /**
     * @param $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function execute($data)
    {
        // Create User
        $data['campaign_register_type'] = CampaignRegisterType::PHOTO;
        DB::beginTransaction();

        try {
            $user = User::query()->create($data);

            // Create Photo
            $photo = $user->photo()->create($data);

            // Save file and set relation with photo
            $file = $this->uploadFiledService->execute($data['file'], 'public', ImageTypeEnum::PHOTO);
            $photo->files()->sync($file);

            // Save downsize file and set relation with photo (308 x 270)
            $resizeFile = $this->uploadFiledService->resize($data['file'], 308, 270);
            $photo->files()->syncWithoutDetaching([$resizeFile->id => ['file_type' => FileType::SUB]]);

            $mail = new UserRegistration($user->name, CampaignRegisterType::PHOTO);

            Mail::to($user->email)
                ->queue($mail->subject('Thư xác nhận tham gia cuộc thi ảnh “Nhật Bản tôi yêu”')
                    ->onQueue('email')
                    ->afterCommit());

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $photo;
    }
}

<?php

namespace App\Mail;

use App\Enums\CampaignRegisterType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;

    protected $type;

    /**
     * UserRegistration constructor.
     *
     * @param string $name
     * @param string $type
     */
    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @return UserRegistration
     */
    public function build()
    {
        switch ($this->type) {
            case CampaignRegisterType::PHOTO:
                return $this->view('campaigns.mails.mail', ['name' => $this->name]);
                break;
            case CampaignRegisterType::STORY:
                return $this->view('campaigns.mails.story', ['name' => $this->name]);
                break;
        }
    }
}

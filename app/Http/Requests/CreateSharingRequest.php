<?php

namespace App\Http\Requests;

use App\Enums\CampaignRegisterType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSharingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->get('type')){
            case CampaignRegisterType::PHOTO:
                $ruleExistOfCampaign =  Rule::exists('photos', 'id')->where('is_approved', 1);
                break;
            case CampaignRegisterType::STORY:
                $ruleExistOfCampaign =  Rule::exists('stories', 'id')->where('is_approved', 1);
                break;
            default:
                $ruleExistOfCampaign = '';

        }
        return [
            'user_id'      => 'required|string',
            'type'         => ['required', Rule::in(CampaignRegisterType::getValues())],
            'campaign_id'  => ['required',  $ruleExistOfCampaign]
        ];
    }
}

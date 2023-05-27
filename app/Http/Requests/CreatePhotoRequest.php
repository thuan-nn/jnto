<?php

namespace App\Http\Requests;

use App\Enums\CampaignRegisterType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePhotoRequest extends FormRequest
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
        return [
            'file'          => 'required|mimes:gif,jpg,png,jpeg|max:20000',
            'name'          => 'required|string|max:255',
            'display_name'  => 'required|string|max:255',
            'phone_number'  => 'required|string|max:10',
            'email'         => ['required','email','max:255', Rule::unique('users')->where('campaign_register_type', CampaignRegisterType::PHOTO)],
            'description'   => 'required|string|max:200',
            'sns_url'       => 'required|array|max:2',
            'term'          => 'required|accepted'
        ];
    }
}

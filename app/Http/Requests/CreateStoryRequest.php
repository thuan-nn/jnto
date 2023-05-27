<?php

namespace App\Http\Requests;

use App\Enums\CampaignRegisterType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateStoryRequest extends FormRequest
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
            'name'         => 'required|string|max:255',
            'title'        => 'required|string|max:60',
            'display_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
            'email'        => ['required', 'email', 'max:255', Rule::unique('users')->where('campaign_register_type', CampaignRegisterType::STORY)],
            'content'      => 'nullable|string|max:1500',
            'sns_url'      => 'required|array|max:2',
            'term'         => 'required|accepted'
        ];
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $data = $this->all();
        $data['content'] = preg_replace( "/\r/", "", request()->get('content'));
        $this->getInputSource()->replace($data);

        /*modify data before send to validator*/
        return parent::getValidatorInstance();
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\CheckAmountSelectBannerRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'is_selected' => ['nullable', new CheckAmountSelectBannerRule($this->banner->id)],
            'order' => 'nullable|integer',
            'file_id' => 'filled|string|exists:files,id'
        ];
    }
}

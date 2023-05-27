<?php

namespace App\Http\Requests;

use App\Rules\CheckAmountSelectBannerRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateBannerRequest extends FormRequest
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
            'order' => 'nullable|integer',
            'is_selected' => ['nullable', new CheckAmountSelectBannerRule()],
            'file_id' => 'required|string|exists:files,id'
        ];
    }
}

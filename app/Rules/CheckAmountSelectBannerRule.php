<?php

namespace App\Rules;

use App\Models\Banner;
use Illuminate\Contracts\Validation\Rule;

class CheckAmountSelectBannerRule implements Rule
{
    protected $bannerId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($bannerId = null)
    {
        $this->bannerId = $bannerId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $bannerSelected = Banner::query()->where('is_selected', true);
        if ($this->bannerId) {
            $bannerSelected->where('id', '<>', $this->bannerId);
        }
        if ($value) {
            return !(($bannerSelected->get()->count() + 1) > 3);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.check_banner_selected');
    }
}

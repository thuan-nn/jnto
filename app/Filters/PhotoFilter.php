<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class PhotoFilter extends Filter
{
    /**
     * @param $isApproved
     * @return mixed
     */
    public function is_approved($isApproved)
    {
        return $this->query->whereLike('is_approved', $isApproved);
    }

    /**
     * @param $description
     *
     * @return Builder
     */
    public function content($description)
    {
        return $this->query->whereUnicode('description', $description);
    }

    /**
     * @param $name
     *
     * @return Builder
     */
    public function name($name)
    {
        return $this->query->whereHas('user', function (Builder $query) use ($name) {
            return $query->where('users.name', 'like', '%' . $name . '%');
        });
    }
}

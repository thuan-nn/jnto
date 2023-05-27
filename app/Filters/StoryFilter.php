<?php


namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

class StoryFilter extends Filter
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
     * @param $content
     * @return \App\Builders\Builder
     */
    public function content($content)
    {
        return $this->query->whereUnicode('content', $content);
    }

    /**
     * @param $title
     *
     * @return \App\Builders\Builder
     */
    public function title($title)
    {
        return $this->query->whereUnicode('title', $title);
    }

    /**
     * @param $name
     *
     * @return \App\Builders\Builder|Builder
     */
    public function name($name)
    {
        return $this->query->whereHas('user', function (Builder $query) use ($name) {
            return $query->where('users.name', 'like', '%' . $name . '%');
        });
    }
}

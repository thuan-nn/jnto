<?php


namespace App\Filters;


use App\Builders\Builder;

class BannerFilter extends Filter
{
    /**
     * @param $order
     *
     * @return Builder
     */
    public function order($order)
    {
        return $this->query->whereLike('order', $order);
    }

    /**
     * @param $content
     *
     * @return \App\Builders\Builder
     */
    public function name($name)
    {
        return $this->query->whereHas('files', function ($query) use ($name) {
            return $query->where('files.name', 'like', '%' . $name . '%');
        });
    }
}

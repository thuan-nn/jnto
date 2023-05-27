<?php


namespace App\Sorts;


class BannerSort extends Sort
{
    /**
     * @param $direction
     *
     * @return \App\Builders\Builder
     */
    public function created_at($direction)
    {
        return $this->query->orderBy('created_at', $direction);
    }

    /**
     * @param $direction
     *
     * @return \App\Builders\Builder
     */
    public function updated_at($direction)
    {
        return $this->query->orderBy('updated_at', $direction);
    }

    /**
     * @param $direction
     *
     * @return \App\Builders\Builder
     */
    public function order($direction)
    {
        return $this->query->orderBy('order', $direction);
    }

    /**
     * @param $direction
     * @return \App\Builders\Builder
     */
    public function selected($direction)
    {
        return $this->query->orderBy('is_selected', $direction);
    }
}

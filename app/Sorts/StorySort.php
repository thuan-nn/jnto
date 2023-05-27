<?php


namespace App\Sorts;


class StorySort extends Sort
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
    public function is_approved($direction)
    {
        return $this->query->orderBy('is_approved', $direction);
    }

    /**
     * @param $direction
     *
     * @return \App\Builders\Builder
     */
    public function title($direction)
    {
        return $this->query->orderBy('title', $direction);
    }
}

<?php


namespace App\Sorts;


class PhotoSort extends Sort {
    /**
     * @param $direction
     * @return \App\Builders\Builder
     */
    public function created_at($direction) {
        return $this->query->orderBy('created_at', $direction);
    }

    /**
     * @param $direction
     * @return \App\Builders\Builder
     */
    public function updated_at($direction) {
        return $this->query->orderBy('updated_at', $direction);
    }

    /**
     * @param $direction
     * @return \App\Builders\Builder
     */
    public function is_approved($direction) {
        return $this->query->orderBy('is_approved', $direction);
    }

    /**
     * @param $direction
     *
     * @return \App\Builders\Builder
     */
    public function count_share($direction)
    {
        return $this->query->withCount('sharingCampaignLog')->orderBy('sharing_campaign_log_count', $direction);
    }
}

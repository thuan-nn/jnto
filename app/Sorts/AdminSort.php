<?php


namespace App\Sorts;


class AdminSort extends Sort {
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
    public function name($direction) {
        return $this->query->orderBy('name', $direction);
    }

    /**
     * @param $direction
     * @return \App\Builders\Builder
     */
    public function login_id($direction) {
        return $this->query->orderBy('login_id', $direction);
    }
}

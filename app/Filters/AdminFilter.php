<?php


namespace App\Filters;


class AdminFilter extends Filter {
    /**
     * @param $name
     * @return mixed
     */
    public function name($name) {
        return $this->query->whereLike('name', $name);
    }

    /**
     * @param $loginId
     * @return mixed
     */
    public function login_id($loginId) {
        return $this->query->whereLike('login_id', $loginId);
    }
}

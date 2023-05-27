<?php

namespace App\Http\Controllers;

class PolicyAndTermController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function policy()
    {
        return view('campaigns.policyandterm.policy');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function term()
    {
        return view('campaigns.policyandterm.term');
    }
}

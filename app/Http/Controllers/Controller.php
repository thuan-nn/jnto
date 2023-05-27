<?php

namespace App\Http\Controllers;

use App\Supports\Traits\HasTransformer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HasTransformer;

    /**
     * @var int $perPage
     */
    protected $perPage;

    /**
     * Controller constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->perPage = (int)$request->get('perPage', 15);
    }
}

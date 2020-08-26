<?php

namespace App\Http\Controllers;

use App\Model\Repository;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $mproxy;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->mproxy = new Repository;
    }
}

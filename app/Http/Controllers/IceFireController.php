<?php

namespace App\Http\Controllers;

use App\Model\JsonResponse;
use App\Model\Repository;
use Illuminate\Http\Request;

class IceFireController extends Controller
{

    public function index(){
        return "Hello world!";
    }

    public function getExternalBooks(){
        $query = $_GET['name'];
        $response = $this->mproxy->getExternalBooks($query);
        return json_encode($response);
    }
}

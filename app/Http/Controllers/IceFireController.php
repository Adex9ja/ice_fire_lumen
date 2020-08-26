<?php

namespace App\Http\Controllers;

use App\Model\JsonResponse;
use App\Model\Repository;
use Illuminate\Http\Request;

class IceFireController extends Controller
{


    public function getExternalBooks(Request $request){
        $query = $request->input();
        $response = $this->mproxy->getExternalBooks($query);
        return json_encode($response);
    }
}

<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function baseResponse(bool $status, String $message)
    {
        return response([
            'success'=>$status,
            'message'=>$message
         ], 200);
    }
}

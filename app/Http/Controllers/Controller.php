<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Build success response
     * @param  $data
     * @param  int $code
     * @return Illuminate\Http\Response
     */
    public function returnResponse($data, $message = '', $success = true) {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'message' => $message
        ], 200);
    }
}

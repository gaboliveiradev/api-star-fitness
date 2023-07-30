<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function success($message, $data, $statusCode)
    {
        return response()->json(['success_message' => $message, 'data' => $data], $statusCode);
    }

    public function error($message, $response, $statusCode)
    {
        return response()->json(['error_message' => $message, "erro" => $response], $statusCode);
    }
}

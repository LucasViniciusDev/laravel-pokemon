<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseJsonData($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    public function responseError($message = 'Erro interno', $code = 500)
    {
        return response()->json([
            'code' => $code,
            'message' => $message
        ]);
    }
}

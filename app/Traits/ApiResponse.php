<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse($data, $message = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message
        ], $code);
    }

    protected function errorResponse($message, $code = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }
}

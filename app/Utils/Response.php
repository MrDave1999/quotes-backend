<?php 
namespace App\Utils;
use App\Constants\StatusCodes;

class Response 
{
    public static function success($message, $data = null)
    {
        return response()->json([
            'status' => StatusCodes::OK,
            'data' => $data,
            'message' => $message
        ], StatusCodes::OK);
    }

    public static function error($message, $status = StatusCodes::INTERNAL_ERROR)
    {
        return response()->json([
            'status' => $status,
            'error' => $message
        ], $status);
    }
}
<?php

namespace App\Utilities;

class ResponseUtility
{
    public static function success($data = null, $message = 'Operación exitosa')
    {
        return [
            'success' => true,
            'message' => $message,
            'data' => $data
        ];
    }

    public static function error($message = 'Error en la operación', $code = 400)
    {
        return [
            'success' => false,
            'message' => $message,
            'code' => $code
        ];
    }
}
<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ManagerErrorOnSaveException extends Exception
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'status'   => 'error',
            'message'  => 'Save or update error!',
        ], 500);
    }
}

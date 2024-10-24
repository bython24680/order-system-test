<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *   title="Order System API",
 *   version="v0.1.0",
 * )
 */
abstract class Controller
{
    /**
     * Get json error response
     *
     * @param string $message
     * @param integer $status_code
     * @param bool $adjust_status_code Optional
     * @return JsonResponse
     */
    protected function getJsonErrorResponse(string $message, int $status_code, bool $adjust_status_code = false): JsonResponse
    {
        // TODO: Log
        if ($adjust_status_code && !in_array($status_code, [400, 404, 500])) {
            $status_code = 500;
        }

        return response()->json(
            [
                'status' => 'error',
                'message' => $message,
                'data' => [],
            ],
            $status_code,
        );
    }

    /**
     * Get json success response
     *
     * @param string $message
     * @param array $return_data
     * @return JsonResponse
     */
    protected function getJsonSuccessResponse(string $message, array $return_data = []): JsonResponse
    {
        return response()->json(
            [
                'status' => 'success',
                'message' => $message,
                'data' => $return_data,
            ],
            200,
        );
    }
}

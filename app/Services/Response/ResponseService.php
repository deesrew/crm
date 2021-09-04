<?php

namespace App\Services\Response;

use Illuminate\Http\JsonResponse;

class ResponseService
{

    /**
     * @param $status
     * @param array $errors
     * @param array $data
     * @return array
     */
    private static function responseParams($status, array $errors = [], array $data = []): array
    {
        return [
            'status' => $status,
            'errors' => (object)$errors,
            'data' => (object)$data,
        ];
    }

    /**
     * @param $status
     * @param int $code
     * @param array $errors
     * @param array $data
     * @return JsonResponse
     */
    public static function sendJsonResponse($status, int $code = 200, array $errors = [], array $data = []): JsonResponse
    {
        return response()->json(
            self::responseParams($status, $errors, $data)
        );
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public static function success(array $data = []): JsonResponse
    {
        return self::sendJsonResponse(true, 200, [], $data);
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public static function notFound(array $data = []): JsonResponse
    {
        return self::sendJsonResponse(false, 404, [], []);
    }

}

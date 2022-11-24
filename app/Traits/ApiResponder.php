<?php


namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponder
{
    /**
     * @param string $message
     * @return JsonResponse
     */
    public function success(string $message = ''): JsonResponse
    {
        return response()->json(['message' => $message], ResponseAlias::HTTP_OK);
    }

    /**
     * @param string $message
     * @param array|object $data
     * @param int $code
     * @return JsonResponse
     */
    public function data(string $message = '', array|object $data = [], int $code = ResponseAlias::HTTP_OK): JsonResponse
    {
        return response()->json(['message' => $message, 'data' => $data], $code);
    }

    /**
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function error(string $message = '', int $code = ResponseAlias::HTTP_BAD_REQUEST): JsonResponse
    {
        return response()->json(['message' => $message], $code);
    }
}

<?php

namespace App\Http\Controllers\Api\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ResponseTrait
{
    /**
     * @param bool $success
     * @param array $data
     * @param int $status
     * @param null $error_code
     * @param string $message
     * @return JsonResponse
     */
    public function respond($success = true, $data = [], $status = 200, $error_code = null, $message = '')
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'error_code' => $error_code,
            'data' => $data
        ], $status);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function respondBadRequest($message = 'Bad Request')
    {
        return $this->respond(false, [], 400, 0, $message);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function respondUnauthorized($message = 'Unauthorized')
    {
        return $this->respond(false, [], 401, 0, $message);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function respondNotFound($message = 'Not found')
    {
        return $this->respond(false, [], 404, 0, $message);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function respondForbidden($message = 'Forbidden')
    {
        return $this->respond(false, [], 403, 0, $message);
    }

    /**
     * @param string $message
     * @return JsonResponse
     */
    public function respondInternalServerError($message = 'Internal Server Error')
    {
        return $this->respond(false, [], 500, 0, $message);
    }

    /**
     * @param \Throwable $e
     * @return JsonResponse|HttpException|\Throwable
     */
    public function respondFail(\Throwable $e)
    {
        if ($e instanceof HttpException) {
            return $this->respond(false, [], $e->getStatusCode(), null, $e->getMessage());
        } else {
            return $this->respondBadRequest($e->getMessage());
        }
    }

    /**
     * @param array $data
     * @param int $status
     * @return JsonResponse
     */
    public function respondSuccess(array $data = [], int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'error_code' => null,
            'data' => $data
        ], $status);
    }
}

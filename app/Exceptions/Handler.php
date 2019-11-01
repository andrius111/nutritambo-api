<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Http\JsonResponse;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(['error' => 'Resource not found'], JsonResponse::HTTP_NOT_FOUND);
        }

        if ($exception instanceof UnauthorizedHttpException) {
            return response()->json(['error' => $exception->getMessage()], JsonResponse::HTTP_UNAUTHORIZED);
        }

        if ($exception->getMessage() == '') {
            return response()->json(['error' => 'Forbidden'], JsonResponse::HTTP_FORBIDDEN);
        }

        if ($exception->getCode() == '23000') {
            return response()->json(['error' => 'Unable to delete data that has 1 or more reference(s).'], JsonResponse::HTTP_BAD_REQUEST);
        }

        return response()->json(['error' => $exception->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
    }
}

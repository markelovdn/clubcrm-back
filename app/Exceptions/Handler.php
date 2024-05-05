<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ItemNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    private function apiErrorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    private function logError(Exception $e)
    {
        Log::error($e->getMessage(), ['exception' => $e]);
    }

    public function register(): void
    {
        $this->renderable(function (Throwable $e, $request) {
            $this->logError($e);
            if ($e instanceof AuthenticationException) {
                return $this->apiErrorResponse(__('apiResponseMessage.auth.accessFail'), 401);
            }
        });

        $this->renderable(function (NotFoundHttpException $e) {
            $this->logError($e);
            return $this->apiErrorResponse('Resource Not Found', 404);
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            $this->logError($e);
            if ($request->is('api/*')) {
                return $this->apiErrorResponse('Model Not Found', 404);
            }
        });

        $this->renderable(function (ValidationException $e) {
            $this->logError($e);
            return response()->json(['errors' => $e->errors()], 422);
        });

        $this->renderable(function (QueryException $e, $request) {
            $this->logError($e);
            if ($e->getCode() === '23000') {
                return (new ForeignKeyConstraintViolationException())->render($request);
            }
        });


        $this->renderable(function (AuthenticationException $e) {
            $this->logError($e);
            return $this->apiErrorResponse(__('apiResponseMessage.auth.loginFail'), 401);
        });

        $this->renderable(function (ItemNotFoundException $e) {
            $this->logError($e);
            return $this->apiErrorResponse(__('apiResponseMessage.itemNotFound'), 404);
        });

        $this->renderable(function (Exception $e, $request) {
            $this->logError($e);
            return $this->apiErrorResponse('Что-то пошло не так, мы уже работаем над этим', 500);
        });
    }
}

<?php

namespace App\Exceptions;

use Exception;

class ForeignKeyConstraintViolationException extends Exception
{
  public function render($request)
  {
    if ($request->is('api/*')) {
      return response()->json([
        'error' => 'Удаление не возможно. Существуют связанные данные.'
      ], 400);
    }
  }
}

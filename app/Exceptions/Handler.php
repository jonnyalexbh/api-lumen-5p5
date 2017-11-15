<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
  /**
  * A list of the exception types that should not be reported.
  *
  * @var array
  */
  protected $dontReport = [
    AuthorizationException::class,
    HttpException::class,
    ModelNotFoundException::class,
    ValidationException::class,
  ];

  /**
  * Report or log an exception.
  *
  * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
  *
  * @param  \Exception  $e
  * @return void
  */
  public function report(Exception $e)
  {
    parent::report($e);
  }

  /**
  * Render an exception into an HTTP response.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Exception  $e
  * @return \Illuminate\Http\Response
  */
  public function render($request, Exception $e)
  {
    if ($e instanceof MethodNotAllowedHttpException) {
      return response()->json((['code' => 405, 'message' => 'The specified method for the request is invalid']), 405);
    }

    if ($e instanceof NotFoundHttpException) {
      return response()->json((['code' => 404, 'message' => 'The specified URL cannot be found']), 404);
    }

    return parent::render($request, $e);
  }
}

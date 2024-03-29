<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (\Exception $e) {
            if ($e->getPrevious() instanceof TokenMismatchException) {
                toastr()->timeOut(10000)->addError('Please submit the form again');

                return back()
                    ->withInput(request()->except('_token'));
            }
            if ($e->getPrevious() instanceof AuthorizationException) {
                toastr()->timeOut(10000)->addError('You are not allowed to perform this action');

                return back();
            }
        });
    }
}

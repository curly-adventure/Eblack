<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        if ($exception instanceof \Exception) {
            // Fetch the error information we would like to 
            // send to the view for emailing
            $error['file']    = $exception->getFile();
            $error['code']    = $exception->getCode();
            $error['line']    = $exception->getLine();
            $error['message'] = $exception->getMessage();
            $error['trace']   = $exception->getTrace();
    
            // Only send email reports on production server
            if(ENV('APP_ENV') == "production"){
                #1. Queue email for sending on "exceptions_emails" queue
                #2. Use the emails.exception_notif view shown below
                #3. Pass the error array to the view as variable $e
                Mail::queueOn('exception_emails', 'mail.exception_notif', ["e" => $error], function ($m) {
                    $m->subject("Laravel Error");
                    $m->from(ENV("MAIL_FROM"), ENV("MAIL_NAME"));
                    $m->to("emmanuelmalan225@gmail.com", "programmeur");
                });
    
            }
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}

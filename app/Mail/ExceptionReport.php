<?php

namespace App\Mail;

use App;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExceptionReport extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * @var \Exception
     */
    public $exception;

    /**
     * Create a new message instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return void
     */
    public function __construct(
        $request,
        Exception $exception
    ) {
        $this->request = $request;
        $this->exception = $exception;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $priority = App::environment('production') ? 1 : 5;
        $subject = '⚠️ Exception thrown @ ' . config('app.name') . ':' . config('app.env');

        return $this
            ->priority($priority)
            ->subject($subject)
            ->markdown('emails.exceptionReport');
    }
}

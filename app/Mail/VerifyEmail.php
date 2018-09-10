<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Verify
     */
    public $verify;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verify)
    {
        $this->verify = $verify;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@ems.com')
                    ->view('mails.verify')
                    ->text('mails.verify_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                      ->attach(public_path('/images').'/verify.jpg', [
                              'as' => 'verify.jpg',
                              'mime' => 'image/jpeg',
                      ]);
    }
}

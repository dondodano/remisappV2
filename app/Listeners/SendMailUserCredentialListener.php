<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailUserCredentialListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendMailUserCredentialEvent $event): void
    {
        try{

            // $token = token();

            // $userToken = UserToken::create([
            //     'user_id' => $event->newId,
            //     'token' => $token
            // ]);

            // Mail::to($event->user->email)
            //     ->send(new UserCredentialMailer([
            //         'recipient' => $event->user->firstname.' '.$event->user->lastname,
            //         'email' => $event->user->email,
            //         'token' => $token
            //     ]));

            //     toastr("Credentail of [<strong>".$event->user->firstname.' '.$event->user->lastname."</strong>] successfully sent!", "success");

        }catch(Exception $e)
        {
            //toastr("Unable to send mail to [<strong>".$event->user->firstname.' '.$event->user->lastname."</strong>]!", "error");
        }
    }
}

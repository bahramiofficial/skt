<?php

namespace App\Listeners;

use App\Services\Sms;
use Illuminate\Support\Facades\Log;
use App\Events\GenerateCodeToLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCodeToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GenerateCodeToLogin  $event
     * @return void
     */
    public function handle(GenerateCodeToLogin $event)
    {
        $user = $event->getUser();
        Sms::send($user->mobile, __('message.activeCodeLogin', ['code' => $user->code]));
    }
}

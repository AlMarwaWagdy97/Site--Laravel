<?php

namespace App\Listeners;

use App\Events\NewCustomerRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
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
     * @param  NewCustomerRegisterEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegisterEvent $event)
    {
        
        dump('slacke message');
        
    }
}

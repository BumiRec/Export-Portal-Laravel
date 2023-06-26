<?php

namespace App\Listeners;

use App\Events\AssignUserRole;

class AssignUserRoleListener
{
    /**
     * Handle the event.
     *
     * @param  AssignUserRole  $event
     * @return void
     */
    public function handle(AssignUserRole $event)
    {
        $user = $event->user;
        $role = $event->role;

        $user->assignRole($role);
    }
}

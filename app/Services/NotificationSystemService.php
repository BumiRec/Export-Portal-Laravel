<?php
namespace App\Services;

use App\Models\NotificationSystem;

class NotificationSystemService
{

    public function notificationSystem($userId)
    {
        $notification = NotificationSystem::join('users', 'users.id', 'notification_system.user_id')
            ->where('users.id', $userId)
            ->select('notification_system.system')
            ->first();

        $systemValue = (int) $notification->system;

        if ($systemValue == 1) {
            NotificationSystem::join('users', 'users.id', 'notification_system.user_id')
                ->where('users.id', $userId)
                ->update(['notification_system.system' => 0]);

            return 'Notifications off';
        }
        if ($systemValue == 0) {
            NotificationSystem::join('users', 'users.id', 'notification_system.user_id')
                ->where('users.id', $userId)
                ->update(['notification_system.system' => 1]);

            return 'Notifications on';
        }
    }
}

<?php
namespace App\Services;

use App\Models\NotificationSystem;

class NotificationSystemService
{

    public function notificationSystem($userId)
    {
        $notification = NotificationSystem::join('users', 'users.id', 'user_notification.user_id')
            ->where('users.id', $userId)
            ->select('user_notification.system')
            ->first();

        $systemValue = (int) $notification->system;

        if ($systemValue == 1) {
            NotificationSystem::join('users', 'users.id', 'user_notification.user_id')
                ->where('users.id', $userId)
                ->update(['user_notification.system' => 0]);

            return 'Notifications off';
        }
        if ($systemValue == 0) {
            NotificationSystem::join('users', 'users.id', 'user_notification.user_id')
                ->where('users.id', $userId)
                ->update(['user_notification.system' => 1]);

            return 'Notifications on';
        }
    }
}

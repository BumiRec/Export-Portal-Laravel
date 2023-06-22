<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserNotification;
use App\Services\ChangeLanguageService;

class NotificationService
{
    public function showAllNotifications($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $notificationId = UserNotification::where('user_id', $id)->value('system');

        if ($notificationId == 1) {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => __('messages.notFound')], 404);
            }

            $notifications = $user->notifications;

            if ($notifications->isEmpty()) {
                return response()->json(['error' => __('messages.notFound')], 404);
            }

            $formattedNotifications = $notifications->pluck('data');

            return response()->json($formattedNotifications, 200);
        }
    }
    public function showUnReadNotifications($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $notificationId = UserNotification::where('user_id', $id)->value('system');

        if ($notificationId == 1) {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => __('messages.notFound')], 404);
            }

            $notifications = $user->unreadNotifications;

            if ($notifications->isEmpty()) {
                return response()->json(['error' => __('messages.notFound')], 404);
            }

            $formattedNotifications = $notifications->pluck('data');
            $notificationCount      = $notifications->count();

            return response()->json([
                'notifications' => $formattedNotifications,
                'unread_count'  => $notificationCount,
            ], 200);
        }
    }

    public function markAsReadNotify($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);
        $notificationId = UserNotification::where('user_id', $id)->value('system');

        if ($notificationId == 1) {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['error' => __('messages.notFound')], 404);
            }

            $user->unreadNotifications->markAsRead();

            $unreadCount = $user->unreadNotifications->count();

            return response()->json([
                'unread_count' => $unreadCount,
            ], 200);
        }
    }
}

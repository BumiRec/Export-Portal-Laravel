<?php

namespace App\Services;

use App\Models\NotificationSystem;
use App\Models\User;
use App\Services\ChangeLanguageService;

class NotificationService
{
    public function showAllNotifications($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $notificationId = NotificationSystem::where('user_id', $id)->value('system');

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
            // $notificationsType = $notifications->pluck('type');

            return response()->json($formattedNotifications, 200);
        }
    }
    public function showUnReadNotifications($id, $languageId)
    {
        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $notificationId = NotificationSystem::where('user_id', $id)->value('system');

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
        $notificationId = NotificationSystem::where('user_id', $id)->value('system');

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
    // public function showAllNotifyByAdmin($id, $languageId)
    // {
    //     $changeLanguage = new ChangeLanguageService;
    //     $changeLanguage->changeLanguage($languageId);

    //     $notificationId = UserNotification::where('user_id', $id)->value('system');

    //     if ($notificationId == 1) {
    //         $user = User::find($id);

    //         if (!$user) {
    //             return response()->json(['error' => __('messages.notFound')], 404);
    //         }

    //         $notifications = $user->notifications;

    //         if ($notifications->isEmpty()) {
    //             return response()->json(['error' => __('messages.notFound')], 404);
    //         }

    //         $adminNotifications = $notifications->filter(function ($notification) {
    //             $type  = $notification->type;
    //             $words = preg_split('/(?=[A-Z])/', $type, -1, PREG_SPLIT_NO_EMPTY);
    //             return in_array('Admin', $words);
    //         });
    //         $formattedNotifications = $adminNotifications->pluck('data');
    //         return response()->json($formattedNotifications, 200);
    //     } else {
    //         return response()->json(['message' => __('messages.noNotificationsByAdmin')], 200);
    //     }
    // }
    // public function showUnReadNotificationsByAdmin($id, $languageId)
    // {
    //     $changeLanguage = new ChangeLanguageService;
    //     $changeLanguage->changeLanguage($languageId);

    //     $notificationId = UserNotification::where('user_id', $id)->value('system');

    //     if ($notificationId == 1) {
    //         $user = User::find($id);

    //         if (!$user) {
    //             return response()->json(['error' => __('messages.notFound')], 404);
    //         }

    //         $notifications = $user->unreadNotifications;

    //         if ($notifications->isEmpty()) {
    //             return response()->json(['error' => __('messages.notFound')], 404);
    //         }

    //         $adminNotifications = $notifications->filter(function ($notification) {
    //             $type  = $notification->type;
    //             $words = preg_split('/(?=[A-Z])/', $type, -1, PREG_SPLIT_NO_EMPTY);
    //             return in_array('Admin', $words);
    //         });

    //         $formattedNotifications = $adminNotifications->pluck('data');
    //         $notificationCount      = $adminNotifications->count();

    //         return response()->json([
    //             'notifications' => $formattedNotifications,
    //             'unread_count'  => $notificationCount,
    //         ], 200);
    //     } else {
    //         return response()->json(['message' => __('messages.noNotificationsByAdmin')], 200);
    //     }
    // }
    // public function markAsReadNotifyByAdmin($id, $languageId)
    // {
    //     $changeLanguage = new ChangeLanguageService;
    //     $changeLanguage->changeLanguage($languageId);
    //     $notificationId = UserNotification::where('user_id', $id)->value('system');

    //     if ($notificationId == 1) {
    //         $user = User::find($id);
    //         if (!$user) {
    //             return response()->json(['error' => __('messages.notFound')], 404);
    //         }

    //         $user->unreadNotifications->markAsRead();

    //         $notifications      = $user->notifications;
    //         $adminNotifications = $notifications->filter(function ($notification) {
    //             $type  = $notification->type;
    //             $words = preg_split('/(?=[A-Z])/', $type, -1, PREG_SPLIT_NO_EMPTY);
    //             return in_array('Admin', $words);
    //         });

    //         $unreadCount            = $adminNotifications->count();
    //         $formattedNotifications = $adminNotifications->pluck('data');

    //         return response()->json([
    //             'notifications' => $formattedNotifications,
    //             'unread_count'  => $unreadCount,
    //         ], 200);
    //     } else {
    //         return response()->json(['message' => __('messages.noNotificationsByAdmin')], 200);
    //     }
    // }

}
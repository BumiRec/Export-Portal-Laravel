<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;

class ListNotificationsController extends Controller
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function showAllNotifications($id, $languageId)
    {
        return response()->json($this->notificationService->showAllNotifications($id, $languageId), 200);
    }
    public function showUnReadNotifications($id, $languageId)
    {
        return response()->json($this->notificationService->showUnReadNotifications($id, $languageId));
    }
    public function markAsReadNotify($id, $languageId)
    {
        return response()->json($this->notificationService->markAsReadNotify($id, $languageId), 200);
    }
}

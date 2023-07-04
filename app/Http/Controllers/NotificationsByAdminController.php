<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;

class NotificationsByAdminController extends Controller
{private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function showAllNotifyByAdmin($id, $languageId)
    {
        return response()->json($this->notificationService->showAllNotifyByAdmin($id, $languageId), 200);

    }
    public function showUnReadNotificationsByAdmin($id, $languageId)
    {
        return response()->json($this->notificationService->showUnReadNotificationsByAdmin($id, $languageId), 200);

    }
    public function markAsReadNotifyByAdmin($id, $languageId)
    {
        return response()->json($this->notificationService->markAsReadNotifyByAdmin($id, $languageId), 200);

    }
}

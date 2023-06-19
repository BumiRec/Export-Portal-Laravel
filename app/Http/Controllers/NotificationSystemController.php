<?php

namespace App\Http\Controllers;

use App\Services\NotificationSystemService;

class NotificationSystemController extends Controller
{
    private NotificationSystemService $notificationSystemService;
    public function __construct(NotificationSystemService $notificationSystemService)
    {
        $this->notificationSystemService = $notificationSystemService;
    }

    public function NotificatiOnOff($userId)
    {
        return response()->json($this->notificationSystemService->notificationSystem($userId));
    }
}

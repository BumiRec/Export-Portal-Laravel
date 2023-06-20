<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Support\Facades\App;

class ListNotificationsController extends Controller
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    public function findNotifications(NotificationService $notificationService, $id, $languageId)
    {
        return response()->json($this->notificationService->notification($id, $languageId), 200);
    }
}

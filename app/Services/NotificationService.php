<?php
namespace App\Services;

use App\Models\UserNotification;
use App\Services\ChangeLanguageService;
use Illuminate\Support\Facades\DB;

class NotificationService
{

    public function notification($id, $languageId)
    {

        $changeLanguage = new ChangeLanguageService;
        $changeLanguage->changeLanguage($languageId);

        $notificationId = UserNotification::where('user_id', $id) -> value('system');
        // return($notificationId);

        if ($notificationId == 1) {
            $notifications = DB::table('notifications')
                ->where('notifiable_id', $id)
                ->get();

           return response()->json($notifications, 200);

            if (!$notifications) {
                return response()->json(['error' => __('messages.notFound')], 404);
            }
        }
    }
}

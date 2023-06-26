<?php

namespace App\Http\Controllers;

use App\Services\NotifyBuyerService;
use Illuminate\Support\Facades\App;

class NotifyBuyerInterested extends Controller
{
    private NotifyBuyerService $notifyBuyerService;
    public function __construct(NotifyBuyerService $notifyBuyerService)
    {
        $this->notifyBuyerService = $notifyBuyerService;
    }
    public function notify($Oid, $Uid, $Pid, $languageId)
    {
         return $this->notifyBuyerService->notifyBuyer($Oid, $Uid, $Pid, $languageId);
    }
}

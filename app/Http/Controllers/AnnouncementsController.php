<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementsRequest;
use App\Interfaces\AnnouncementsInterface;

class AnnouncementsController extends Controller
{
    private AnnouncementsInterface $announcementsInterface;
    public function __construct(AnnouncementsInterface $announcementsInterface)
    {
        $this->announcementsInterface = $announcementsInterface;
    }
    public function announcements(AnnouncementsRequest $announcementsRequest)
    {

        return response()->json($this->announcementsInterface->createAnnouncements($announcementsRequest));
    }

    public function announcementsUpdate($id)
    {
        return response()->json($this->announcementsInterface->updateAnnouncements($id));
    }
}

<?php

namespace App\Implementations;

use App\Http\Requests\AnnouncementsRequest;
use App\Interfaces\AnnouncementsInterface;
use App\Models\Announcements;

class AnnouncementsImplementation implements AnnouncementsInterface
{

    public function createAnnouncements(AnnouncementsRequest $announcementsRequest): Announcements
    {
        return Announcements::create([
            'title'  => $announcementsRequest->title,
            'text'   => $announcementsRequest->text,
            'status' => $announcementsRequest->status,
        ]);
    }
}

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
            'title' => $announcementsRequest->title,
            'text'  => $announcementsRequest->text,
        ]);
    }

    public function updateAnnouncements($id): Announcements
    {
        $announcements         = Announcements::find($id);
        $announcements->status = 0;
        $announcements->save();
        return $announcements;
    }

    public function showAnnouncements()
    {
        return Announcements::get(['title', 'text', 'status', 'created_at']);
    }

}

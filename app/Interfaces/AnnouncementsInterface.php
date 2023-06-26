<?php

namespace App\Interfaces;
use App\Http\Requests\AnnouncementsRequest;
use App\Models\Announcements;

interface AnnouncementsInterface{

    public function createAnnouncements(AnnouncementsRequest $announcementsRequest): Announcements;
}
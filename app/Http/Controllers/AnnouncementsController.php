<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementsRequest;
use App\Interfaces\AnnouncementsInterface;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    private AnnouncementsInterface $announcementsInterface;
    public function __construct(AnnouncementsInterface $announcementsInterface){
        $this->announcementsInterface = $announcementsInterface;
    }
    public function announcements(AnnouncementsRequest $announcementsRequest){

        return response()->json($this->announcementsInterface->createAnnouncements($announcementsRequest));
    }
}

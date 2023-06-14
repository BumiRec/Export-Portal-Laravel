<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;

use App\Services\ActivityService;
use Illuminate\Support\Facades\App;


class ActivityController extends Controller
{
    private ActivityService $acticityService;

    public function __construct(ActivityService $acticityService){
        $this->acticityService = $acticityService;
    }
    public function activitycontroller(ActivityRequest $activityRequest, $language)
    {
        $locale = config('app.available_locales');
        App::setLocale($locale[$language]);
        
        return response()->json($this->acticityService->activity($activityRequest, $language));
    }
}

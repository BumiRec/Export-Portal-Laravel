<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity_company;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    function activitycontroller(Request $request)
    {
        $validator = Validator::make(
            $request -> all(),
            [
                'activity_area_id' => 'required|integer',
                // 'company_id'=> 'integer',
            ]
        );

            $activityAreaId = strval($request->activity_area_id);

            // $activityAreaId = $request->activity_area_id;
            // $activityAreaId = (string) $request->activity_area_id;
            // $companyID = $request->company_id;
            // $activity = activity_company::create([
            //     'activity_area_id' => $activityAreaId,
           // 'company_id'=>$companyID,
        // ]);

        // $split = Str::of($activityAreaId)->explode('');
        $split = str_split($activityAreaId, 1);


        for ($i = 0; $i < count($split); $i++) {
            DB::table('activity_company')->insert([
                'activity_area_id' => $split[$i],
                'company_id' => 2
            ]);
        }
        return response()->json('ok');
    }
}

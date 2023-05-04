<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    function company (Request $request){
      $validator = Validator::make(
            $request->all(),
        [
           'name'=> 'required|string|max:255',
           'keywords'=> 'required|string|max:255',
           'country'=> 'required|string|max:255',
           'web_adress'=> 'required|string|max:255',
           'more_info' => 'required|string|max:255',
           'budged' => 'required|string|max:255',
           'type'=> 'required|string|max:255',
           'taxpayer_office'=> 'required|string|max:255',
           'TIN'=> 'required|string|max:255',
            'category_id'=> 'required|integer',
            'subcategory_id'=> 'required|integer',
        ]);
       if ($validator->fails()) {
            return response() -> json(['errors' => $validator->errors()], 400);
        }

        $company = company::create([
            'name' => $request->name,
            'keywords'=>$request->keywords,
            'country'=>$request->country,
            'web_adress'=>$request->web_adress,
            'more_info'=>$request->more_info,
            'budged'=>$request->budged,
            'type'=>$request->type,
            'taxpayer_office'=>$request->taxpayer_office,
            'TIN'=>$request->TIN,
            'category_id'=>$request->category_id, 
            'subcategory_id'=>$request->subcategory_id,
        ]);

        return response()->json(['company' => $company], 201);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    private SearchService $search;
    public function __construct(SearchService $search)
    {
        $this->search = $search;
    }

    public function companySearch(SearchRequest $search)
    {
        return response()->json($this->search->searchCompany($search));
    }

    public function productSearch(SearchRequest $search)
    {
        return response()->json($this->search->searchProduct($search));
    }

    public function userSearch(SearchRequest $search){
        return response()->json($this->search->searchUser($search));
    }
}
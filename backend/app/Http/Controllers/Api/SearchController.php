<?php

namespace App\Http\Controllers;

use App\DTOs\Legal\LegalCollectionDTO;
use Exception;
use Fomvasss\Dadata\Facades\DadataSuggest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SearchController extends Controller
{

    public function findLegal(Request $request)
    {
        $query = trim($request->input('query'));

        try {
            $legalsData = DadataSuggest::partyById($query);
            $legals = LegalCollectionDTO::fromDadataResponse(Arr::wrap($legalsData));
        } catch (Exception $e) {
            return response()->error($e->getMessage());
        }

        return response()->success($legals);
    }
}

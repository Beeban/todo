<?php

namespace App\Http\Controllers;

use App\DTOs\Legal\LegalCollectionDTO;
use App\Http\Requests\LegalRequest;
use App\Services\Legal\LegalService;
use Fomvasss\Dadata\Facades\DadataSuggest;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    private $legalService;

    public function __construct(LegalService $legalService)
    {
        $this->legalService = $legalService;
    }

    public function index()
    {
        $legals = $this->legalService->getLegals();
        return view('legal.index', compact('legals'));
    }

    public function findLegal(Request $request)
    {
        $query = trim($request->input('query'));
        $legalsData = DadataSuggest::partyById($query);
        $legals = LegalCollectionDTO::fromDadataRequest($legalsData);

        return response()->success($legals);
    }

    public function update(LegalRequest $request, Legal $legal)
    {
        $legal = $this->legalService->updateLegal($request, $legal);

        if ($request->ajax()) {
            return response()->success($legal);
        } else {
            return view('legals.index');
        }
    }

    public function store(LegalRequest $request)
    {
        $legal = $this->legalService->createLegal($request);

        if ($request->ajax()) {
            return response()->success($legal);
        } else {
            return view('legal.index');
        }
    }
}

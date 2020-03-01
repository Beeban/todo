<?php

namespace App\Http\Controllers;

use App\DTOs\Legal\LegalCollectionDTO;
use App\Http\Requests\Legals\Create;
use App\Http\Requests\Legals\Filter;
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

    public function index(Filter $request)
    {
        $legals = $this->legalService->getLegals();
        return view('legal.index', compact('legals'))->withErrors('test');
    }

    public function show(Request $request, $id)
    {
        $legal = $this->legalService->getLegal($id);

        if ($request->ajax()) {
            return response()->success($legal);
        } else {
            return view('legals.index', compact('legal'));
        }
    }

    public function update(Update $request, Legal $legal)
    {
        $legal = $this->legalService->updateLegal($request, $legal);

        if ($request->ajax()) {
            return response()->success($legal);
        } else {
            return view('legals.index');
        }
    }

    public function store(Create $request)
    {
        $legal = $this->legalService->createLegal($request);

        if ($request->ajax()) {
            return response()->success($legal);
        } else {
            return view('legal.index');
        }
    }

    public function findLegal(Request $request)
    {
        $query = trim($request->input('query'));
        $legalsData = DadataSuggest::partyById($query);
        $legals = LegalCollectionDTO::fromDadataRequest($legalsData);

        return response()->success($legals);
    }
}

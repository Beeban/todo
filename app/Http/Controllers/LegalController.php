<?php

namespace App\Http\Controllers;

use App\Http\Requests\Legals\Create;
use App\Http\Requests\Legals\Filter;
use App\Http\Requests\Legals\Update;
use App\Services\Legal\LegalService;
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
        if ($request->ajax()) {
            return response()->success($legals);
        } else {
            return view('legal.index', compact('legals'));
        }
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

    public function update(Update $request, $id)
    {
        $legal = $this->legalService->updateLegal($request, $id);

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
}

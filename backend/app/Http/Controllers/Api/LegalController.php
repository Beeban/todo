<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Legals\Create;
use App\Http\Requests\Legals\Filter;
use App\Http\Requests\Legals\Update;
use App\Http\Resources\Legal\LegalResource;
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
        $legals = $this->legalService->getLegals($request);
        return response()->success(LegalResource::collection($legals));
    }

    public function show(Request $request, $id)
    {
        $legal = $this->legalService->getLegal($id);
        return response()->success(new LegalResource($legal));
    }

    public function update(Update $request, $id)
    {
        $legal = $this->legalService->updateLegal($request, $id);
        return response()->success(new LegalResource($legal));

    }

    public function store(Create $request)
    {
        $legal = $this->legalService->createLegal($request);
        return response()->success(new LegalResource($legal));
    }
}

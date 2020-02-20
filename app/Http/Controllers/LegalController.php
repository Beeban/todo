<?php

namespace App\Http\Controllers;

use App\Services\FnsApiService;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    protected $fnsApiService;

    public function __construct(FnsApiService $fnsApiService)
    {
        $this->fnsApiService = $fnsApiService;
    }

    public function index()
    {
        return view('legal.index');
    }

    public function findLegal(Request $request)
    {
        $query = trim($request->input('query'));
        return response()->success($this->fnsApiService->findLegalById($query));
    }
}

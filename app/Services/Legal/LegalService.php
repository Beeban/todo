<?php
namespace App\Services\Legal;

use App\Http\Requests\LegalRequest;
use App\Legal;
use Illuminate\Database\Eloquent\Collection;

class LegalService
{

    public function getLegals(): Collection
    {
        return Legal::with('signer')->get();
    }

    public function createLegal(LegalRequest $request): Legal
    {
        $legal = Legal::create($request->all());
        return $legal;
    }

    public function updateLegal(LegalRequest $request, Legal $legal): Legal
    {
        $legal = Legal::update($request->all());
        return $legal;
    }
}

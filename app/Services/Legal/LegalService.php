<?php
namespace App\Services\Legal;

use App\Http\Requests\Legals\Update;
use App\Http\Requests\Legal\Create;
use App\Legal;
use Illuminate\Database\Eloquent\Collection;

class LegalService
{

    public function getLegals(): Collection
    {
        return Legal::with('signer')->get();
    }

    public function getLegal(int $id): Legal
    {
        return Legal::with('contacts')->findOrFail($id);
    }

    public function createLegal(Create $request): Legal
    {
        $legal = Legal::create($request->all());
        return $legal;
    }

    public function updateLegal(Update $request, int $id): Legal
    {
        $legal = Legal::findOrFail($id);

        $legal->update($request->all());
        return $legal;
    }
}

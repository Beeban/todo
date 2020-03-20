<?php
namespace App\Services\Legal;

use App\Http\Requests\Legals\Create;
use App\Http\Requests\Legals\Filter;
use App\Http\Requests\Legals\Update;
use App\Legal;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class LegalService
{

    public function getLegals(Filter $request = null): Collection
    {
        $name = $request->name;
        $address = $request->address;
        $inn = $request->inn;
        $signer = $request->signer;

        $legals = Legal::with('signer')
            ->when($name, function ($query, $name) {
                return $query
                    ->where('name', 'like', "%{$name}%")
                    ->orWhere('full_name', 'like', "%{$name}%");
            })
            ->when($address, function ($query, $address) {
                return $query
                    ->where('address', 'like', "%{$address}%");
            })
            ->when($inn, function ($query, $inn) {
                return $query
                    ->where('inn', 'like', "%{$inn}%");
            })
            ->get();

        return $legals;
    }

    public function getLegal(int $id): Legal
    {
        return Legal::with('contacts')->findOrFail($id);
    }

    public function createLegal(Create $request): Legal
    {
        try {
            DB::beginTransaction();
            $legal = Legal::create($request->all());
            $legal = $this->setLegalContacts($legal, $request->contacts);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        return $legal;
    }

    public function updateLegal(Update $request, int $id): Legal
    {
        try {
            DB::beginTransaction();
            $legal = Legal::findOrFail($id);
            $legal->update($request->all());
            $legal = $this->setLegalContacts($legal, $request->contacts);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        return $legal;
    }

    private function setLegalContacts(Legal $legal, ?array $contacts)
    {
        if ($contacts !== null) {
            //$legal->contacts()->whereNotIn('id', array_column($contacts, 'id'))->delete();
            foreach ($contacts as $contact) {
                $contact['legal_id'] = $legal->id;
                $affectedContact = $legal->contacts()->updateOrCreate(['id' => $contact['id'] ?? null], $contact);
                if (isset($contact['is_signer']) && $contact['is_signer']) {
                    $legal->signer()->associate($affectedContact)->save();
                }
            }
            $legal->load('contacts');
        }
        return $legal;
    }
}

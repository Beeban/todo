<?php

namespace App\Http\Resources\Legal;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalResource extends JsonResource
{
    public function toArray($request)
    {
        if (is_null($this->resource)) {
            return [];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'inn' => $this->inn,
            'ogrn' => $this->ogrn,
            'kpp' => $this->kpp,
            'opp' => $this->opp,
            'address' => $this->address,
            'signer_id' => $this->signer_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'signer' => new LegalContactResource($this->whenLoaded('signer')),
            'contacts' => LegalContactResource::collection($this->whenLoaded('contacts')),
        ];
    }
}

<?php

namespace App\Http\Resources\Legal;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalContactResource extends JsonResource
{
    public function toArray($request, ?integer $signerId = null)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'position' => $this->position,
            'is_signer' => $this->isSigner,
        ];
    }
}

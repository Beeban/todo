<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalContacts extends Model
{
    protected $table = 'legal_contacts';

    protected $fillable = ['name', 'position', 'phone', 'email', 'legal_id'];

    public function legal()
    {
        return $this->hasOne(Legal::class, 'id', 'legal_id');
    }

    public function getIsSignerAttribute()
    {
        return $this->legal->signer_id === $this->id;
    }
}

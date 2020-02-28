<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalContacts extends Model
{
    protected $table = 'legal_contacts';

    protected $fillable = ['name', 'position', 'phone', 'email', 'legal_id'];

    public function contacts()
    {
        return $this->belongsTo(LegalContacts::class, 'legal_id', 'id');
    }
}

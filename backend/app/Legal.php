<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    protected $table = 'legals';

    protected $fillable = ['name', 'full_name', 'address', 'opp', 'inn', 'kpp', 'ogrn', 'signer_id'];

    public function contacts()
    {
        return $this->hasMany(LegalContacts::class, 'legal_id', 'id');
    }

    public function signer()
    {
        return $this->belongsTo(LegalContacts::class, 'signer_id', 'id');
    }
}

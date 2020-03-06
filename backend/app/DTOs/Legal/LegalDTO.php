<?php

namespace App\DTOs\Legal;

use \Spatie\DataTransferObject\DataTransferObject;

class LegalDTO extends DataTransferObject
{

    public $id;
    public $name;
    public $full_name;
    public $inn;
    public $ogrn;
    public $kpp;
    public $opp;
    public $address;
    public $signer_id;
    public $contacts;

    public static function fromDadataResponse(array $params)
    {
        return new self([
            'name' => $params['data']['name']['short_with_opf'],
            'full_name' => $params['data']['name']['full_with_opf'],
            'inn' => $params['data']['inn'],
            'ogrn' => $params['data']['ogrn'],
            'kpp' => $params['data']['kpp'],
            'opp' => $params['data']['opp'] ?? null,
            'address' => $params['data']['address']['value'] ?? null,
            'contacts' => LegalContactCollectionDTO::fromDadataResponse([$params]),
        ]);
    }
}

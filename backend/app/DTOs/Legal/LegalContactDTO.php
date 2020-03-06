<?php

namespace App\DTOs\Legal;

use \Spatie\DataTransferObject\DataTransferObject;

class LegalContactDTO extends DataTransferObject
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $position;
    public $legal_id;

    public static function fromDadataResponse(array $params)
    {
        return new self([
            'name' => $params['data']['management']['name'],
            'position' => $params['data']['management']['post'],
        ]);
    }
}

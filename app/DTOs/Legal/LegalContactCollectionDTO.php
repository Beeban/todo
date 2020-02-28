<?php

namespace App\DTOs\Legal;

use \Spatie\DataTransferObject\DataTransferObjectCollection;

class LegalContactCollectionDTO extends DataTransferObjectCollection
{

    public function current(): LegalContactDTO
    {
        return parent::current();
    }

    public static function fromDadataRequest(array $data): LegalContactCollectionDTO
    {
        $collection = [];
        foreach ($data as $item) {
            $collection[] = LegalContactDTO::fromDadataRequest($item);
        }
        return new self($collection);
    }
}

<?php

namespace App\DTOs\Legal;

use \Spatie\DataTransferObject\DataTransferObjectCollection;

class LegalCollectionDTO extends DataTransferObjectCollection
{

    public function current(): LegalDTO
    {
        return parent::current();
    }

    public static function fromDadataRequest(array $data): LegalCollectionDTO
    {
        $collection = [];
        foreach ($data as $item) {
            $collection[] = LegalDTO::fromDadataRequest($item);
        }
        return new self($collection);
    }
}

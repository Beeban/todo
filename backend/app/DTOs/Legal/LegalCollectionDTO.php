<?php

namespace App\DTOs\Legal;

use \Spatie\DataTransferObject\DataTransferObjectCollection;

class LegalCollectionDTO extends DataTransferObjectCollection
{

    public function current(): LegalDTO
    {
        return parent::current();
    }

    public static function fromDadataResponse(array $response): LegalCollectionDTO
    {
        $collection = [];
        if (isset($response['data'])) {
            $collection[] = LegalDTO::fromDadataResponse($response);
        } else {
            foreach ($response as $item) {
                $collection[] = LegalDTO::fromDadataResponse($item);
            }
        }
        return new self($collection);
    }
}

<?php

namespace App\Services;

use Ixudra\Curl\Facades\Curl;

class FnsApiService
{

    public function __construct()
    {
        $this->url = config('services.dadata.url');
        $this->token = config('services.dadata.token');
    }

    /**
     * @param string $query inn or orgn of organization
     */
    public function findOrganizationById(string $query)
    {
        return Curl::to($this->url . 'findById/party')
            ->withHeader('Authorization: token ' .  $this->token)
            ->withData(['query' => $query])
            ->asJson()
            ->post();
    }
}

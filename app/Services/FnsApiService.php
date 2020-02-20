<?php

namespace App\Services;

use App\Http\Resources\External\DadataLegal;
use Ixudra\Curl\Facades\Curl;

class FnsApiService
{

    public function __construct()
    {
        $this->url = config('services.dadata.url');
        $this->token = config('services.dadata.token');
    }

    /**
     * @param string $query inn or orgn of legal
     */
    public function findLegalById(string $query)
    {
        $response = Curl::to($this->url . '/findById/party')
            ->withHeader('Authorization: token ' .  $this->token)
            ->withData(['query' => $query])
            ->asJson()
            ->post();
        
        $data = DadataLegal::collection(collect($response->suggestions))->toArray(true);
        dd($data);
    }

    public function convertLegalData(array $data){

    }
}

<?php

namespace App\Services\Acervo;

use Illuminate\Support\Facades\Http;

class ApiAcervoAntigo
{

    private $token;
    private $url;
    private $jwt;

    public function __construct()
    {
        $this->token = env('API_SIC_TOKEN');
        $this->url = env('API_SIC_URL');
        $this->jwt =  $this->getJwtToken();
    }

    public function getJwtToken()
    {
        $response = Http::post($this->url . 'login', ['user' => $this->token]);
        if ($response->successful()) {
            $data = $response->json();
            return $data['token'];
        }
    }

    public function getAcervo($rg)
    {
        $response = Http::asJson()->withHeaders([
            'Authorization' => 'Bearer ' . $this->jwt,
        ])->withBody(json_encode(['rg' => $rg]), 'application/json')->get($this->url . 'get-acervo');
        if ($response->successful()) {
            $data = $response->json();
            return $data['data'];
        }
        return null;
    }

}

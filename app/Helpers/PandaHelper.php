<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class PandaHelper
{
    private $urlFeeder;
    private $username;
    private $password;
    private $act;

    function __construct(string $query = '', array $attr = [])
    {

        $urlFeeder = env('PANDA_URL');

        $this->urlFeeder = $urlFeeder;
        $this->username = env('PANDA_EMAIL');
        $this->password = env('PANDA_PASSWORD');
        $this->act['query'] = Str::replaceArray('?', $attr, $query);
    }

    private function getToken()
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->urlFeeder . 'api/login', [
                'email' => $this->username,
                'password' => $this->password,
            ]);
    
            return $response->json();
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Jaringan tidak aktif, tampilkan pesan kesalahan kepada pengguna.
            return view('errors.connection');
        }
    }

    public function getData()
    {
        $getToken = $this->getToken();
        if (isset($getToken['success']) && $getToken['success'] === true) {
            $token = $getToken['token'];
            $this->act['token'] = $token;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($this->urlFeeder . 'panda', $this->act);
            return $response->json();
        }else {
            // Handle the case where 'success' key is not present or not true
            return view('errors.connection');
        }
    }
}

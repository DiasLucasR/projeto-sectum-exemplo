<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CepService {
    public function buscarEndereco($cep) {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
        return $response->json();
    }
}

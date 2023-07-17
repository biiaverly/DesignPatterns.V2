<?php

namespace       app\Services\Http;

use app\Interfaces\HttpAdapterInterface;
use App\Services\EstadosOrcamento\Finalizado;
use App\Services\Orcamento\Orcamento;

class RegistraOrcamento
{
    private HttpAdapterInterface $http;

    public function __construct(HttpAdapterInterface $http)
    {
        $this->http = $http;
    }

    public function registrar(Orcamento $orcamento): void
    {
        if (!$orcamento->estadoAtual instanceof Finalizado) {
            throw new \DomainException(
                'Apenas orçamentos finalizados podem ser registrados na API'
            );
        }

        // this route dont exists.
        $this->http->post('http://api.registrar.orcamento', [
            'valor' => $orcamento->valor,
            'quantidadeItens' => $orcamento->quantidadeItens
        ]);
    }
}


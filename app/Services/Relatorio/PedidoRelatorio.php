<?php

namespace  App\Services\Relatorio;

use App\Interfaces\ConteudoExportado;
use App\Services\Pedido\Pedido;

class PedidoRelatorio implements ConteudoExportado
{
    private Pedido $pedido;

    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    public function conteudo(): array
    {
        return[
            'data_finalizado' => $this->pedido->dataFinalizacao->format('d/m/Y'),
            'nome_cliente'    => $this->pedido->nomeCliente
        ];
    }
}


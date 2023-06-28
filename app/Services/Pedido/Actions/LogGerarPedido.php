<?php

declare(strict_types=1);

namespace       App\Services\Pedido\Actions;

use App\Services\Pedido\Pedido;



class LogGerarPedido implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): string
    {
        return "Gerando log de geração de pedido";
    }
}

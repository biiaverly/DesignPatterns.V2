<?php

declare(strict_types=1);

namespace       App\Services\Pedido\Actions;

use App\Services\Pedido\Pedido;


class EnviarPedidoPorEmail implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido): string
    {
        return "Enviando e-mail de pedido gerado";
    }
}

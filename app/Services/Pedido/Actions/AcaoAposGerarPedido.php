<?php

declare(strict_types=1);

namespace       App\Services\Pedido\Actions;

use App\Services\Pedido\Pedido;



interface AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido);
}
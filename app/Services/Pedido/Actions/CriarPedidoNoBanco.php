<?php

declare(strict_types=1);

namespace       App\Services\Pedido\Actions;

use App\Services\Pedido\Pedido;



class CriarPedidoNoBanco implements AcaoAposGerarPedido
{
    public function executaAcao(Pedido $pedido):string
    {
        return "Salvando pedido no banco de dados";
    }
}

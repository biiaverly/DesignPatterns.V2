<?php

declare(strict_types=1);

namespace  App\Services\Pedido;

use App\Services\Orcamento\Orcamento;


class GerarPedidoHandler
{
    public function __construct(/* PedidoRepository, MailService */)
    {
    }

    public function execute(GerarPedido $gerarPedido)
    {
        $orcamento = new Orcamento();
        $orcamento->quantidadeItens = $gerarPedido->getNumeroItens();
        $orcamento->valor = $gerarPedido->getValorOrcamento();

        $pedido = new Pedido();
        $pedido->dataFinalizacao = new \DateTimeImmutable();
        $pedido->nomeCliente = $gerarPedido->getNomeCliente();
        $pedido->orcamento = $orcamento;

        return $pedido;
    }
}

<?php

declare(strict_types=1);

namespace  App\Services\Pedido;

use App\Services\Orcamento\Orcamento;
use App\Services\Pedido\Actions\AcaoAposGerarPedido;


class GerarPedidoHandler
{
    /** @var AcaoAposGerarPedido[] */
    private array $acoesAposGerarPedido = [];

    public function __construct(/* PedidoRepository, MailService */)
    {
    }

    public function adicionarAcaoAoGerarPedido(AcaoAposGerarPedido $acao)
    {
        $this->acoesAposGerarPedido[] = $acao;
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

        foreach ($this->acoesAposGerarPedido as $acao) {
            $status = $acao->executaAcao($pedido);
            $array_status[] = $status;
        }
        $array_status = [
            "Banco" => $array_status[0],
            "Email" => $array_status[1],
            "Log" => $array_status[2]

        ];

        return [$pedido,$array_status];
    }
}

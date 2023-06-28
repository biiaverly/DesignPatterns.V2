<?php

namespace App\Console\Commands;

use App\Services\Pedido;
use App\Services\Orcamento;
use App\Services\Pedido\Actions\CriarPedidoNoBanco;
use App\Services\Pedido\Actions\EnviarPedidoPorEmail;
use App\Services\Pedido\Actions\LogGerarPedido;
use Illuminate\Console\Command;
use App\Services\Pedido\GerarPedido;
use App\Services\Pedido\GerarPedidoHandler;

class GerarPedidoCommand extends Command
{
    /// COMMAND
    
    protected $signature = 'pedido:gerar {nomeCliente} {valor} {quantidadeItens}';

    protected $description = 'Gera um novo pedido';

    public function handle()
    {
        $nomeCliente = $this->argument('nomeCliente');
        $valor = $this->argument('valor');
        $quantidadeItens = $this->argument('quantidadeItens');

        $gerarPedido = new GerarPedido($valor, $quantidadeItens, $nomeCliente);
        $gerarPedidoHandler = new GerarPedidoHandler();

        $gerarPedidoHandler->adicionarAcaoAoGerarPedido(new CriarPedidoNoBanco());
        $gerarPedidoHandler->adicionarAcaoAoGerarPedido(new EnviarPedidoPorEmail());
        $gerarPedidoHandler->adicionarAcaoAoGerarPedido(new LogGerarPedido());
        $pedido = $gerarPedidoHandler->execute($gerarPedido);

        // Exemplo de exibição das informações do pedido gerado
        $this->info('Pedido gerado:');
        $this->line('Nome do Cliente: ' . $pedido[0]->nomeCliente);
        $this->line('Data de Finalização: ' . $pedido[0]->dataFinalizacao->format('Y-m-d H:i:s'));
        $this->line('Valor do Orçamento: ' . $pedido[0]->orcamento->valor);
        $this->line('Quantidade de Itens: ' . $pedido[0]->orcamento->quantidadeItens);

        $this->line('Banco: ' . $pedido[1]['Banco']);
        $this->line('Email: ' . $pedido[1]['Email']);
        $this->line('Log: ' . $pedido[1]['Log']);

    }
}
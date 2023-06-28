<?php

namespace App\Console\Commands;

use App\Services\Pedido;
use App\Services\Orcamento;
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
        $pedido = $gerarPedidoHandler->execute($gerarPedido);
        

        // Exemplo de exibição das informações do pedido gerado
        $this->info('Pedido gerado:');
        $this->line('Nome do Cliente: ' . $pedido->nomeCliente);
        $this->line('Data de Finalização: ' . $pedido->dataFinalizacao->format('Y-m-d H:i:s'));
        $this->line('Valor do Orçamento: ' . $pedido->orcamento->valor);
        $this->line('Quantidade de Itens: ' . $pedido->orcamento->quantidadeItens);
    }
}
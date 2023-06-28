<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class CommandTest extends TestCase
{
    /** @test */
    public function test_Gerar_Pedido()
    {
        $nomeCliente = 'Exemplo Cliente';
        $valor = 100.50;
        $quantidadeItens = 5;

        $arguments = [
            'nomeCliente' => $nomeCliente,
            'valor' => $valor,
            'quantidadeItens' => $quantidadeItens,
        ];

        // Executar o comando GerarPedidoCommand
        Artisan::call('pedido:gerar', $arguments);

        // Capturar a saída do comando
        $output = Artisan::output();

        // Verificar se a saída contém as informações do pedido gerado
        $this->assertStringContainsString('Pedido gerado:', $output);
        $this->assertStringContainsString('Nome do Cliente: ' . $nomeCliente, $output);
        $this->assertStringContainsString('Valor do Orçamento: ' . $valor, $output);
        $this->assertStringContainsString('Quantidade de Itens: ' . $quantidadeItens, $output);
    }
}

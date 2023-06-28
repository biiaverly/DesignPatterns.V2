<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ObserverTest extends TestCase
{
    /** @test */
    public function test_Gerar_Pbedido()
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
        // dd($output);

        // Verificar se a saída contém as informações do pedido gerado
        $this->assertStringContainsString('Banco: Salvando pedido no banco de dados', $output);
        $this->assertStringContainsString('Email: Enviando e-mail de pedido gerado', $output);
        $this->assertStringContainsString('Log: Gerando log de geração de pedido', $output);
    }
}

<?php

namespace Tests\Feature;

use App\Services\Descontos\CalculadoraDesconto;
use App\Services\Orcamento\Orcamento;
use Tests\TestCase;

class ChainOfResponsabilityTest extends TestCase
{
    public function test_deve_calcular_desconto_mais_500_reais()
    {
        $valor = 600;
        $quantidadeItens = 1;
        $desconto   = new CalculadoraDesconto;
        $orcamento  = new Orcamento;

        $orcamento->valor = $valor;
        $orcamento->quantidadeItens = $quantidadeItens;
        $valorDescontado = $desconto->calculaDescontos($orcamento);

        $this->assertEquals(6,$valorDescontado);
    }

    public function test_deve_calcular_desconto_mais_500_itens()
    {
        $valor = 100;
        $quantidadeItens = 501;
        $desconto   = new CalculadoraDesconto;
        $orcamento  = new Orcamento;

        $orcamento->valor = $valor;
        $orcamento->quantidadeItens = $quantidadeItens;
        $valorDescontado = $desconto->calculaDescontos($orcamento);

        $this->assertEquals(5,$valorDescontado);
    }
}

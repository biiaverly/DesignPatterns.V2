<?php

use Tests\TestCase;
use App\Services\Imposto\Icpp;
use App\Services\Orcamento\Orcamento;
use App\Services\Imposto\CalculaImpostoService;
use App\Services\Imposto\Ikcv;

class TemplateMethodTest extends TestCase
{
    public function test_calculo_imposto_Icpp():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 1000;
        $orcamento->quantidadeItens = 1;

        $valor = $calculadora->calcula($orcamento, new Icpp());
        $this->assertEquals($valor, 30);

    }

    public function test_calculo_imposto_Ikcv():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 1000;
        $orcamento->quantidadeItens = 1;

        $valor = $calculadora->calcula($orcamento, new Ikcv());
        $this->assertEquals($valor, 25);

    }

}

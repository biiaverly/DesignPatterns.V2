<?php

namespace Tests\Feature;

use App\Services\Imposto\CalculaImpostoService;
use App\Services\Imposto\Icms;
use App\Services\Imposto\Iss;
use App\Services\Orcamento\Orcamento;
use Tests\TestCase;

class StrategyTest extends TestCase
{
    public function test_Calculo_Com_Imposto_Iss():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 100;

        $valor = $calculadora->calcula($orcamento, new Iss());
        $this->assertEquals($valor, 6);

    }

    public function test_Calculo_Com_Imposto_Icms():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 100;

        $valor = $calculadora->calcula($orcamento, new Icms());
        $this->assertEquals($valor, 10);

    }
}

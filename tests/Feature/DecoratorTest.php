<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\Imposto\Iss;
use App\Services\Orcamento\Orcamento;
use App\Services\Imposto\CalculaImpostoService;
use App\Services\Imposto\Icms;
use App\Services\Imposto\Icpp;
use App\Services\Imposto\Ikcv;

class DecoratorTest extends TestCase
{
    public function test_calcula_imposto_composto_Iss_Icpp():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 100;

        $valor = $calculadora->calcula($orcamento, new Iss(new Icpp()));
        $this->assertEquals($valor, 8);
    }      
    public function test_calcula_imposto_composto_Iss():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 100;

        $valor = $calculadora->calcula($orcamento, new Iss());
        $this->assertEquals($valor, 6);
    }   
    public function test_calcula_imposto_composto_Iss_Ikcv_Icms():void
    {
        $calculadora = new CalculaImpostoService();
        $orcamento = new Orcamento();
        $orcamento->valor = 100;

        $valor = $calculadora->calcula($orcamento, new Iss(new Ikcv( new Icms())));
        $this->assertEquals($valor, 18.5);
    }   
}


<?php

use App\Services\Orcamento\Orcamento;
use Tests\TestCase;


class StateTest extends TestCase
{
    public function test_estado_em_aprovacao():void
    {
        $orcamento =  new Orcamento();
        $orcamento->valor = 1000;
        $orcamento->quantidadeItens = 1;
        $desconto = $orcamento->aplicaDescontoExtra();

        $this->assertEquals($orcamento->valor,950);


    }
    public function test_estado_aprovado():void
    {
        $orcamento =  new Orcamento();
        $orcamento->valor = 1000;
        $orcamento->quantidadeItens = 1;
        $orcamento->aprova();
        $desconto = $orcamento->aplicaDescontoExtra();

        $this->assertEquals($orcamento->valor,980);

    }

    public function test_estado_finalizado():void
    {
        try 
        {
            $orcamento =  new Orcamento();
            $orcamento->valor = 1000;
            $orcamento->quantidadeItens = 1;
            $orcamento->aprova();
            $orcamento->finaliza();
            $desconto = $orcamento->aplicaDescontoExtra();
        } catch (Exception $exception){}
        $this->assertStringContainsString($exception->getMessage(),'Um orçamento finalizado não pode receber desconto');
    }

    public function test_estado_reprovado():void
    {
        try 
        {
            $orcamento =  new Orcamento();
            $orcamento->valor = 1000;
            $orcamento->quantidadeItens = 1;
            $orcamento->reprova();
            $desconto = $orcamento->aplicaDescontoExtra();
        } catch (Exception $exception){}
        $this->assertStringContainsString($exception->getMessage(),'Um orçamento reprovado não pode receber desconto');
    }


}

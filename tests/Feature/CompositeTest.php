<?php

namespace Tests\Feature;

use App\Services\Orcamento\ItemOrcamento;
use App\Services\Orcamento\Orcamento;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class CompositeTest extends TestCase
{

    public function test_orcamentoInicio(): void
    {

        // Orcamento Inicial -  2 itens valor de 800 

        $orcamentoInicial = new Orcamento();
        $item1 = new ItemOrcamento();
        $item1->valor = 300;
        $item2 = new ItemOrcamento();
        $item2->valor = 500;

        $orcamentoInicial->addItens($item1);
        $orcamentoInicial->addItens($item2);
        $valor = $orcamentoInicial->valor();
        assertEquals($valor,800.0);
    }

    public function test_orcamento_adicional(): void
    {

        // Orcamento Inicial -  2 itens valor de 800 

        $orcamentoInicial = new Orcamento();
        $item1 = new ItemOrcamento();
        $item1->valor = 300;
        $item2 = new ItemOrcamento();
        $item2->valor = 500;

        $orcamentoInicial->addItens($item1);
        $orcamentoInicial->addItens($item2);

        // Talvez o cliente inclua 1 item para o novo orcamento
        $orcamentoAcrescimo = new Orcamento();
        $item3 = new ItemOrcamento();
        $item3->valor = 150;
        $orcamentoAcrescimo->addItens($item3);

        $orcamentoInicial->addItens($orcamentoAcrescimo);
        assertEquals($orcamentoInicial->valor(),950);

    }
}

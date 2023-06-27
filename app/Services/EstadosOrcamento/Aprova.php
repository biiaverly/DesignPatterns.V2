<?php

namespace App\Services\EstadosOrcamento;

use App\Services\Orcamento\Orcamento;
use App\Services\EstadosOrcamento\EstadoOrcamento;

class Aprova extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }

    public function finaliza(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Finalizado();
    }


}

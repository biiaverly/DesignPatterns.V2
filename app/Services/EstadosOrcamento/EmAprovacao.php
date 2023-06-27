<?php

declare(strict_types=1);

namespace       App\Services\EstadosOrcamento;

use App\Services\Orcamento\Orcamento;
use App\Services\EstadosOrcamento\Aprova;
use App\Services\EstadosOrcamento\EstadoOrcamento;

class EmAprovacao extends EstadoOrcamento

{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.05;
    }


    public function reprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Reprovado();
    }

    public function aprova(Orcamento $orcamento)
    {
        $orcamento->estadoAtual = new Aprova();
    }
}

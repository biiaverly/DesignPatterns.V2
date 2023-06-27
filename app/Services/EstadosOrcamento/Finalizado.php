<?php


namespace       App\Services\EstadosOrcamento;

use App\Services\Orcamento\Orcamento;
use App\Services\EstadosOrcamento\EstadoOrcamento;


class Finalizado extends EstadoOrcamento
{
    public function calculaDescontoExtra(Orcamento $orcamento): float
    {
        throw new \DomainException('Um orçamento finalizado não pode receber desconto');
    }
}



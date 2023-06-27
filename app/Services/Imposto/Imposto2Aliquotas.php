<?php

namespace App\Services\Imposto;

use App\Interfaces\ImpostoInterface;
use App\Services\Orcamento\Orcamento;

abstract class Imposto2Aliquotas implements ImpostoInterface
{
    
    abstract protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool;
    abstract protected function calculaTaxaMaxima(Orcamento $orcamento): float;
    abstract protected function calculaTaxaMinima(Orcamento $orcamento): float;
    
    public function calculaImposto(Orcamento $orcamento): float
    {
        if ($this->deveAplicarTaxaMaxima($orcamento))
        {
            return $this->calculaTaxaMaxima($orcamento);
        }
        return $this->calculaTaxaMinima($orcamento);

    }
}

<?php

namespace  App\Services\Imposto;

use App\Services\Orcamento\Orcamento;
use App\Services\Imposto\Imposto2Aliquotas;

class Icpp extends Imposto2Aliquotas
{
    protected function deveAplicarTaxaMaxima(Orcamento $orcamento): bool
    {        
        return $orcamento->valor > 500;
    }
    
    protected function calculaTaxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.03;
    }

    protected function calculaTaxaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.02;
    }


}



<?php


namespace App\Services\Imposto;

use App\Services\Orcamento\Orcamento;
use App\Services\Imposto\Imposto2Aliquotas;

class Ikcv extends Imposto2Aliquotas
{

    protected function deveAplicarTaxaMaxima(Orcamento  $orcamento): bool
    {
        return $orcamento->valor > 300 && $orcamento->quantidadeItens > 3;
    }

    protected function calculaTaxaMaxima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.04;
                
    }

    protected function calculaTaxaMinima(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.025;        
    }
}

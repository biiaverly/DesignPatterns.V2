<?php

namespace App\Services\Imposto;

use App\Interfaces\Imposto;
use App\Interfaces\ImpostoInterface;
use App\Services\Orcamento\Orcamento;

class CalculaImpostoService
{
    public function calcula(Orcamento $orcamento, ImpostoInterface $imposto): float
    {
        return $imposto->calculaImposto($orcamento);
    }
}

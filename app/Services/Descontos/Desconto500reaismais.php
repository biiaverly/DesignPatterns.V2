<?php

declare(strict_types=1);

namespace App\Services\Descontos;

use App\Services\Descontos\Desconto;
use App\Services\Orcamento\Orcamento;

class Desconto500reaismais  extends Desconto
{
    public function calculaDesconto(Orcamento $orcamento): float
    {
        if ($orcamento->valor > 500) {
            return $orcamento->valor * 0.01;
        }

        return $this->desconto->calculaDesconto($orcamento);
    }
}

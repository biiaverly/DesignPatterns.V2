<?php

declare(strict_types=1);

namespace App\Services\Imposto;

use App\Interfaces\ImpostoInterface;
use App\Services\Orcamento\Orcamento;

class Iss implements ImpostoInterface
{
    public function calculaImposto(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.06;
    }
}


<?php

declare(strict_types=1);

namespace App\Services\Imposto;

use App\Interfaces\ImpostoInterface;
use App\Services\Orcamento\Orcamento;

class Icms implements ImpostoInterface
{
    public function calculaImposto(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.1;
    }
}

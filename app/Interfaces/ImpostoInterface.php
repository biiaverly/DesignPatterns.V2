<?php

declare(strict_types=1);

namespace  App\Interfaces;

use App\Services\Orcamento\Orcamento;

interface ImpostoInterface
{
    public function calculaImposto(Orcamento $orcamento): float;
}

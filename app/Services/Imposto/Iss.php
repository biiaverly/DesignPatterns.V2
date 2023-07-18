<?php

declare(strict_types=1);

namespace App\Services\Imposto;

use App\Interfaces\ImpostoInterface;
use App\Services\Orcamento\Orcamento;

class Iss extends ImpostoInterface
{
    ///ConcreteComponent
    public function realizaCalculoEspecifico(Orcamento $orcamento): float
    {
        return $orcamento->valor * 0.06;
    }
}


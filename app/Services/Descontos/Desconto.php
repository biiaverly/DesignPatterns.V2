<?php

declare(strict_types=1);

namespace  App\Services\Descontos;

use App\Services\Orcamento\Orcamento;

abstract class Desconto
{
    protected ?Desconto $desconto;

    public function __construct(?Desconto $desconto)
    {
        $this->desconto = $desconto;
    }

    abstract public function calculaDesconto (Orcamento $orcamento):float;
}


<?php

declare(strict_types=1);

namespace App\Services\Descontos;

use App\Services\Orcamento\Orcamento;


class SemDesconto extends Desconto
{
    public function __construct()
    {
        parent::__construct(null);
        
    }
    public function calculaDesconto(Orcamento $orcamento): float
    {
        return 0;
    }
}

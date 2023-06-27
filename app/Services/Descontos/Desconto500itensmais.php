<?php

namespace App\Services\Descontos;

use App\Services\Orcamento\Orcamento;


class Desconto500itensmais extends Desconto 
{
    public function calculaDesconto(Orcamento $orcamento): float
    {
        if ($orcamento->quantidadeItens > 500) {
            return $orcamento->valor * 0.05;
        }
        return $this->desconto->calculaDesconto($orcamento);
    }
        
}

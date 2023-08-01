<?php

declare(strict_types=1);

namespace  App\Services\Descontos;

use App\Services\Orcamento\Orcamento;


class CalculadoraDesconto
{
    public function calculaDescontos(Orcamento $orcamento): float
    {
        $cadeiaDeDescontos = new Desconto500itensmais(
            new Desconto500reaismais(
                new SemDesconto()
            )
        );

        $descontoCalculado = $cadeiaDeDescontos->calculaDesconto($orcamento);

        $logDesconto = new LogDesconto();
        $logDesconto->informar($descontoCalculado);

        return $descontoCalculado;

    }
}
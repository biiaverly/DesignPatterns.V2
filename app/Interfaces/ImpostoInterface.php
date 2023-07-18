<?php

declare(strict_types=1);

namespace  App\Interfaces;

use App\Services\Orcamento\Orcamento;

/// COMPONENT

abstract class ImpostoInterface
{
    private ?ImpostoInterface $outroImposto;

    public function __construct(ImpostoInterface $outroImposto = null)
    {
        $this->outroImposto = $outroImposto;
    }

    abstract protected function realizaCalculoEspecifico(Orcamento $orcamento): float;

    public function calculaImposto(Orcamento $orcamento)    {
        return $this->realizaCalculoEspecifico($orcamento) + $this->realizaCalculoDeOutroImposto($orcamento);
    }

    private function realizaCalculoDeOutroImposto(Orcamento $orcamento)
    {
        return $this->outroImposto === null ? 0 : $this->outroImposto->calculaImposto($orcamento);
    }
}
 
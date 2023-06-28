<?php

declare(strict_types=1);

namespace       App\Services\Pedido;

use App\Services\Orcamento\Orcamento;


class Pedido 
{
    public string $nomeCliente;
    public \DateTimeInterface $dataFinalizacao;
    public Orcamento $orcamento;

}

<?php

declare(strict_types=1);

namespace  App\Services\Relatorio;

use App\Interfaces\ConteudoExportado;
use App\Services\Orcamento\Orcamento;

class OrcamentoRelatorio implements ConteudoExportado
{
    private Orcamento $orcamento;

    public function __construct(Orcamento $orcamento)
    {
         $this->orcamento = $orcamento;
    }

    public function conteudo(): array
    {
        return[
            'valor' => $this->orcamento->valor,
            'quantidadeItens' => $this->orcamento->quantidadeItens

        ];
        
    }
    

}
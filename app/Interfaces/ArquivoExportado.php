<?php

declare(strict_types=1);

namespace App\Interfaces;

interface ArquivoExportado
{
    public function salvar(ConteudoExportado $conteudoExportado): string;
}

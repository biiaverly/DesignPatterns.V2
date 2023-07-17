<?php

declare(strict_types=1);

namespace App\Services\Relatorio;

use App\Interfaces\ArquivoExportado;
use App\Interfaces\ConteudoExportado;

class ExportarZip implements ArquivoExportado
{
    private string $nomeArquivoInterno;

    public function __construct(string $nomeArquivoInterno)
    {
        $this->nomeArquivoInterno = $nomeArquivoInterno;
    }

    public function salvar(ConteudoExportado $conteudoExportado): string
    {
        $caminhoArquivo = tempnam(sys_get_temp_dir(), 'zip');
        $arquivoZip = new \ZipArchive();
        $arquivoZip->open($caminhoArquivo);
        $arquivoZip->addFromString($this->nomeArquivoInterno, serialize($conteudoExportado->conteudo()));
        $arquivoZip->close();

        return $caminhoArquivo;
    }
}


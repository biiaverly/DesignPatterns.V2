<?php

namespace   App\Services\Relatorio;

use App\Services\Orcamento\Orcamento;
use ZipArchive;

class OrcamentoZip
{
    public function exportar(Orcamento $orcamento)
    {
        $path =sys_get_temp_dir().DIRECTORY_SEPARATOR.'Orcamento.zip' ;
        $zip = new ZipArchive;
        $zip->open($path,ZipArchive::CREATE);
        $zip->addFromString('orcamento.serial',serialize($orcamento));
        $zip->close();
        
    }
}


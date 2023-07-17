<?php

namespace Tests\Feature;

use App\Services\Orcamento\Orcamento;
use App\Services\Relatorio\OrcamentoZip;
use Tests\TestCase;
use ZipArchive;

class BridgeTest extends TestCase
{
    public function test_zip_file():void
    {
        $orcamentoZip = new OrcamentoZip();
        $orcamento = new Orcamento();
        $orcamento->valor = 100;

        $orcamentoZip->exportar($orcamento);
      
        $path =sys_get_temp_dir().DIRECTORY_SEPARATOR.'Orcamento.zip' ;

        $zip= new ZipArchive();
        $zip->open($path);
        $content = $zip->getFromName('orcamento.serial');
        $this->assertEquals(strpos($content,'"valor";d:100'), 47);

    }

}


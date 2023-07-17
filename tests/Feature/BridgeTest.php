<?php

namespace Tests\Feature;

use App\Services\Orcamento\Orcamento;
use ZipArchive;
use Tests\TestCase;
use DateTimeImmutable;
use App\Services\Pedido\Pedido;
use App\Services\Relatorio\ExportarXml;
use App\Services\Relatorio\ExportarZip;
use App\Services\Relatorio\OrcamentoRelatorio;
use App\Services\Relatorio\PedidoRelatorio;
use SimpleXMLElement;

class BridgeTest extends TestCase
{
    public function test_xml_file_pedido():void
    {
        $pedido = new Pedido();
        $pedido->nomeCliente = 'bia verly';
        $pedido->dataFinalizacao = new DateTimeImmutable();

        $pedidoExportado = new PedidoRelatorio($pedido);
        $pedidoExportadoXml = new ExportarXml('pedido');

        $path = $pedidoExportadoXml->salvar($pedidoExportado);
        $xml = simplexml_load_file($path);
        $this->assertEquals('bia verly', (string) $xml->nome_cliente);
    }

    public function test_xml_file_orcamento():void
    {
        $orcamento = new Orcamento();
        $orcamento->valor = 100;
        $orcamento->quantidadeItens = 2;

        $orcamentoExportado = new OrcamentoRelatorio($orcamento);
        $orcamentoExportadoXml = new ExportarXml('orcamento');

        $path = $orcamentoExportadoXml->salvar($orcamentoExportado);
        $xml = simplexml_load_file($path);
        $this->assertEquals('100', (string) $xml->valor);
    }

    public function test_xml_file_pedido_zip():void
    {
        $pedido = new Pedido();
        $pedido->nomeCliente = 'bia verly';
        $pedido->dataFinalizacao = new DateTimeImmutable();

        $pedidoExportado = new PedidoRelatorio($pedido);
        $pedidoExportadoXml = new ExportarXml('pedido');

        $zip = new ExportarZip('pedido');
        $path = $zip->salvar($pedidoExportado);
        $fileName = str_replace('/tmp/',"",$path);

        $zip= new ZipArchive();
        $zip->open($path);
        $content = $zip->getFromName('pedido');
        $this->assertEquals(strpos($content,'"nome_cliente";s:9:"bia verly"'), 51);

    }

}


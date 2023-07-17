<?php

namespace  App\Services\Relatorio;

use App\Services\Orcamento\Orcamento;
use SimpleXMLElement;

class OrcamentoXml
{
    public $xml;

    public function __construct(SimpleXMLElement $xml)
    {
        $this->xml = $xml;
    }
    public function exportar (Orcamento $orcamento):string
    {
        $this->xml->addChild('valor',$orcamento->valor);
        $this->xml->addChild('quantidade_itens',$orcamento->quantidadeItens);

        return $this->xml->asXML();

    }
}



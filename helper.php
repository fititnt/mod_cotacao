<?php

/*
 * @package         mod_cotacao
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class Cotacao {

    /**
     * Funcao que faz scrapping da pagina do Banco Central do Brasil e pega
     * especificamente a data, valor de compra e de venda do Dolar americano em
     * relacao ao Real Brasileiro
     * 
     * @return object $dolar ($dolar->data, $dolar->compra, $dolar->venda)
     */
    public function getDolar() {
        //Get page
        $page = $this->_getUrlContents('http://www4.bcb.gov.br/pec/taxas/batch/taxas.asp?id=txdolar');
        //Load DOM Page
        $doc = new DOMDocument();
        $doc->loadHTML($page);
        //Load XPath
        $xpath = new DOMXPath($doc);
        //Querie
        $dolar = new stdClass();
        $dolar->data = NULL;
        $dolar->compra = NULL;
        $dolar->venda = NULL;

        $queryResult = $xpath->query("//td[@class='fundoPadraoBClaro2'][1]");
        if ($queryResult->length > 0) {
            $node = $queryResult->item(0);
            $dolar->data = $node->nodeValue;
        }

        $queryResult = $xpath->query("//td[@class='fundoPadraoBClaro2'][2]");
        if ($queryResult->length > 0) {
            $node = $queryResult->item(0);
            $dolar->compra = $node->nodeValue;
        }

        $queryResult = $xpath->query("//td[@class='fundoPadraoBClaro2'][3]");
        if ($queryResult->length > 0) {
            $node = $queryResult->item(0);
            $dolar->venda = $node->nodeValue;
        }

        return $dolar;
    }

    /**
     * @todo implementar esta funcao
     * @return     
     */
    public function getEuro() {
        $euro = '';
        return $euro;
    }

    /**
     * Return contents of url
     * 
     * @param string $url
     * @param string $certificate path to certificate if is https URL
     * @return string
     */
    protected function _getUrlContents($url, $certificate = FALSE) {
        //$page = file_get_contents($url);            
        $ch = curl_init(); //Inicializar a sessao           
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Retorne os dados em vez de imprimir em tela
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate); //Check certificate if is SSL, default FALSE
        curl_setopt($ch, CURLOPT_URL, $url); //Setar URL
        $content = curl_exec($ch); //Execute
        curl_close($ch); //Feche          

        return $content;
    }

    /**
     * Funcao que ajuda debugar DOMNodeList
     * 
     * @see http://www.php.net/manual/pt_BR/class.domxpath.php#87645
     * @param DOMNodeList $elements 
     */
    private function _xpathDebug($elements) {
        if (!is_null($elements)) {
            foreach ($elements as $element) {
                echo "<br/>[" . $element->nodeName . "] ";
                $nodes = $element->childNodes;
                foreach ($nodes as $node) {
                    echo $node->nodeValue . "\n";
                }
            }
        }
    }

}


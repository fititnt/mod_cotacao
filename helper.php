<?php

/**
 * @package    Fititnt.modCotacao
 * @author     Emerson Rocha Luiz <emerson@webdesign.eng.br>
 * @copyright  Copyright (C) 2012 Webdesign Assessoria em Tecnologia da Informacao. All rights reserved.
 * @license    GNU General Public License version 3. See license.txt
 *
 */
defined('_JEXEC') or die;

/**
 * Pega cotação
 * 
 * @package  Fititnt.modCotacao
 * @since    1.7
 */
class Cotacao {

	/**
	 * Funcao que faz scrapping da pagina do Banco Central do Brasil e pega
	 * especificamente a data, valor de compra e de venda do Dolar americano em
	 * relacao ao Real Brasileiro
	 * 
	 * @return  object  $dolar   ($dolar->data, $dolar->compra, $dolar->venda)
	 */
	public function getDolar()
	{
		// Get page
		$page = $this->_getUrlContents('http://www4.bcb.gov.br/pec/taxas/batch/taxas.asp?id=txdolar');

		// Load DOM Page
		$doc = new DOMDocument;
		$doc->loadHTML($page);

		// Load XPath
		$xpath = new DOMXPath($doc);

		// Querie
		$dolar = new stdClass;
		$dolar->data = null;
		$dolar->compra = null;
		$dolar->venda = null;

		$queryResult = $xpath->query("//td[@class='fundoPadraoBClaro2'][1]");
		if ($queryResult->length > 0)
		{
			$node = $queryResult->item(0);
			$dolar->data = $node->nodeValue;
		}

		$queryResult = $xpath->query("//td[@class='fundoPadraoBClaro2'][2]");
		if ($queryResult->length > 0)
		{
			$node = $queryResult->item(0);
			$dolar->compra = $node->nodeValue;
		}

		$queryResult = $xpath->query("//td[@class='fundoPadraoBClaro2'][3]");
		if ($queryResult->length > 0)
		{
			$node = $queryResult->item(0);
			$dolar->venda = $node->nodeValue;
		}

		return $dolar;
	}

	/**
	 * Metodo não implementado
	 * 
	 * @todo  implementar esta funcao
	 * 
	 * @return  string    
	 */
	public function getEuro()
	{
		$euro = '';
		return $euro;
	}

	/**
	 * Return contents of url
	 * 
	 * @param   string  $url          URL 
	 * @param   string  $certificate  path to certificate if is https URL
	 *
	 * @return  string
	 */
	protected function _getUrlContents($url, $certificate = false)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate);
		curl_setopt($ch, CURLOPT_URL, $url);
		$content = curl_exec($ch);
		curl_close($ch);

		return $content;
	}

	/**
	 * Funcao que ajuda debugar DOMNodeList
	 *
	 * @param   DOMNodeList  $elements  Elementos a serem parseados
	 * 
	 * @return  void
	 *
	 * @see http://www.php.net/manual/pt_BR/class.domxpath.php#87645
	 */
	private function _xpathDebug($elements)
	{
		if (!is_null($elements))
		{
			foreach ($elements as $element)
			{
				echo "<br/>[" . $element->nodeName . "] ";
				$nodes = $element->childNodes;
				foreach ($nodes as $node)
				{
					echo $node->nodeValue . "\n";
				}
			}
		}
	}

}

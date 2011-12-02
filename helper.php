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
     * 
     * @return     
     */
    public function getDolar() {
        //...        
        return $cotacao;
    }

    /**
     * 
     * @return     
     */
    public function getEuro() {
        //...        
        return $cotacao;
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

}

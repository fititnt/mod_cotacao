<?php

/**
 * @package    Fititnt.modCotacao
 * @author     Emerson Rocha Luiz <emerson@webdesign.eng.br>
 * @copyright  Copyright (C) 2012 Webdesign Assessoria em Tecnologia da Informacao. All rights reserved.
 * @license    GNU General Public License version 3. See license.txt
 *
 */
defined('_JEXEC') or die;

// Include helper.php once
require_once dirname(__FILE__) . '/helper.php';

$c = new Cotacao;
$dolar = $c->getDolar();

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', null));
$modbefore = htmlspecialchars_decode(($params->get('modbefore', '')));
$modafter = htmlspecialchars_decode(($params->get('modafter', '')));

require JModuleHelper::getLayoutPath('mod_cotacao', 'default');

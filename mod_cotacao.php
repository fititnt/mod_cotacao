<?php
/*
 * @package         mod_cotacao
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

// Include helper.php once
require_once dirname(__FILE__).'/helper.php';

$c = new Cotacao;

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', NULL));
$modbefore = htmlspecialchars_decode(($params->get('modbefore','')));
$modafter = htmlspecialchars_decode(($params->get('modafter','')));

require JModuleHelper::getLayoutPath('mod_cotacao', 'default');
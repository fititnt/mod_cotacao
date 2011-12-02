<?php
/*
 * @package         mod_cotacao
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecniligia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="cotacao<?php echo $moduleclass_sfx; ?>">
<?php 
echo $modbefore;
echo $c->getDolar(); 
echo $modafter;
?>
</div>

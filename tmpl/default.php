<?php

/**
 * @package    Fititnt.modCotacao
 * @author     Emerson Rocha Luiz <emerson@webdesign.eng.br>
 * @copyright  Copyright (C) 2012 Webdesign Assessoria em Tecnologia da Informacao. All rights reserved.
 * @license    GNU General Public License version 3. See license.txt
 *
 */
defined('_JEXEC') or die;
?>
<div class="cotacao<?php echo $moduleclass_sfx; ?>">
    <?php echo $modbefore; ?>
    <p><?php echo JText::_('MOD_COTACAO_DOLAR_DATA'); ?> <span class="cotacao-data"><?php echo $dolar->data; ?></span></p>
    <p><?php echo JText::_('MOD_COTACAO_DOLAR_COMPRA'); ?> <span class="cotacao-compra"><?php echo $dolar->compra; ?></span></p>
    <p><?php echo JText::_('MOD_COTACAO_DOLAR_VENDA'); ?> <span class="cotacao-venda"><?php echo $dolar->venda; ?></span></p>
    <?php echo $modafter; ?>
</div>

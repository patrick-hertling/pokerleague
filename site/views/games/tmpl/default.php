<?php
/**
 * @version     1.0.0
 * @package     com_pokerleague
 * @copyright   Copyright (C) 2013. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Patrick Hertling <patrickhertling@gmail.com>
 */
defined('_JEXEC') or die; ?>

<a href="<?php echo JRoute::_('index.php?option=com_pokerleague&task=pokerleague.newgame') ?>">
  <button><?php echo JText::_("COM_POKERLEAGUE_NEW_GAME") ?></button>
</a>

<pre>
<?php
  foreach ($this->items as $game) {
    print_r($game);
  }
?>
</pre>

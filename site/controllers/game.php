<?php
/**
 * @version     1.0.0
 * @package     com_pokerleague
 * @copyright   Copyright (C) 2013. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Patrick Hertling <patrickhertling@gmail.com>
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Game controller class.
 */
class PokerleagueControllerGame extends JControllerForm {

  public function newGame() {
    
    $this->setRedirect(JRoute::_("index.php?option=com_pokerleague&view=game&layout=newgame"));
  }

  public function startGame() {
    
    $this->setRedirect(JRoute::_("index.php?option=com_pokerleague&view=game&layout=game"));
  }

  public function startFreezeout() {
    
    $this->setRedirect(JRoute::_("index.php?option=com_pokerleague&view=game&layout=freezeout"));
  }
  
  public function eliminatePlayer() {
    
    $this->setRedirect(JRoute::_("index.php?option=com_pokerleague&view=game&layout=freezeout"));
  }
  
  public function redoElimination() {
    
    $this->setRedirect(JRoute::_("index.php?option=com_pokerleague&view=game&layout=freezeout"));
  }

  public function finnishGame() {
    
    $this->setRedirect(JRoute::_("index.php?option=com_pokerleague&view=games"));
  }

}
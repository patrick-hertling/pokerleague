<?php
/**
 * @version     1.0.0
 * @package     com_pokerleague
 * @copyright   Copyright (C) 2013. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Patrick Hertling <patrickhertling@gmail.com> - http://
 */
 
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class PokerleagueController extends JControllerLegacy {
  
  public function display($cachable = false, $urlparams = false) {
    
		// Get the document object.
		$document	= JFactory::getDocument();

		// Set the default view name and format from the Request.
		$vName   = $this->input->getCmd('view', 'login');
		$vFormat = $document->getType();
		$lName   = $this->input->getCmd('layout', 'default');
    
    // Set userpermissions
    $user = JFactory::getUser();
    $isAdmin = $user->authorise("core.admin", "com_pokerleague");
    
		if ($view = $this->getView($vName, $vFormat)) {
			// Do any specific processing by view.
			switch ($vName) {
        
        case "games":
          $model = $this->getModel("games");
          break;
        
        case "game":
          $model = $this->getModel("game");
          break;
      }
    }
    // Push the model into the view (as default).
    $view->setModel($model, true);
    $view->setLayout($lName);

    // Push document object into the view.
    $view->document = $document;

    $view->display();
  }
}


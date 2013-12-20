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

jimport('joomla.application.component.controllerform');

/**
 * Player controller class.
 */
class PokerleagueControllerPlayer extends JControllerForm
{

    function __construct() {
        $this->view_list = 'players';
        parent::__construct();
    }

}
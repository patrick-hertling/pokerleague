<?php
/**
 * @version     1.0.0
 * @package     com_pokerleague
 * @copyright   Copyright (C) 2013. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Patrick Hertling <patrick.hertling@kanaren-it.com>
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Zldmanager records.
 */
class PokerleagueModelGames extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = null, $direction = null) {

      // Initialise variables.
      $app = JFactory::getApplication();

      // List state information
      $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
      $this->setState('list.limit', $limit);

      $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
      $this->setState('list.start', $limitstart);
        
      if(empty($ordering)) {
        $ordering = 'a.ordering';
      }

      // List state information.
      parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {

      $db = $this->getDbo();
      $query = $db->getQuery(true);

      // Select the required fields from the table.
      $query
              ->select("*")
              ->from($db->qn("#__pokerleague_game"));
      
      return $query;
    }

    public function getItems() {
        return parent::getItems();
    }

}

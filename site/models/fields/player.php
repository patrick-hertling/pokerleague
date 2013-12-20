<?php
/**
 * @version     1.0.0
 * @package     com_pokerleague
 * @copyright   Copyright (C) 2013. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Patrick Hertling <patrickhertling@gmail.com>
 */
defined('_JEXEC') or die;

jimport('joomla.form.formfield');

require_once( JPATH_COMPONENT.'/helpers/zldmanager.php' );

/**
 * Supports an HTML select list of categories
 */
class JFormFieldPlayer extends JFormField
{
  /**
   * The form field type.
   *
   * @var		string
   * @since	1.6
   */
	protected $type = 'player';
  /**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
//    $attr = array("class"=>"comzld-time-select");
    $attr = array();
    $options = $this->getOptions();
    return JHtml::_("select.genericlist", $options, $this->name, $attr, "value", "text", $this->value, $this->id);
	}
  
  function getOptions() {
    
    $db = JFactory::getDbo();
    $query = $db->getQuery(true);
    $query
      ->select($db->qn(array("name", "user_id")))
      ->from($db->qn("#__pokerleague_player"));
    $db->setQuery($query);
    $list = $db->loadObjectList();
    
    $options = array();
    foreach ($list as $player) {
      $options[$player->user_id] = $player->name;
    }
    
    return $options;
  }
}

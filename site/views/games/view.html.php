<?php
/**
 * @version     1.0.0
 * @package     com_pokerleague
 * @copyright   Copyright (C) 2013. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Patrick Hertling <patrickhertling@gmail.com>
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * View class for a list of Zldmanager.
 */
class PokerleagueViewGame extends JViewLegacy
{
	protected $state;
  protected $params;
  protected $type;
  protected $items;
  
  /**
	 * Display the view
	 */
	public function display($tpl = null)
	{
        $app = JFactory::getApplication();
        
        $this->type   = $this->get("Type");
        $this->state = $this->get('State');
        $this->params = $app->getParams('com_zldmanager');
        $this->items = $this->get("Items");
        
        // Check for errors.
        if (count($errors = $this->get('Errors'))) {;
            throw new Exception(implode("\n", $errors));
        }
        
        // Add specific css for view
//        JHtml::stylesheet(Juri::base() . 'components/com_zldmanager/assets/css/administration.css');
        
        $this->_prepareDocument();
        parent::display($tpl);
	}


	/**
	 * Prepares the document
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();
		$title	= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		} else {
			$this->params->def('page_heading', JText::_('com_zldmanager_DEFAULT_PAGE_TITLE'));
		}
		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}
  
  /**
   * URL for redirect purpuses. Set &return=$this->currentUrlEncode()
   * 
   * @return string Base64 encoded, URL escaped current URL
   */
  protected function currentQueryEncode() {
    
    $uri = JFactory::getURI();
    $currentQuery = $uri->getQuery();
   
    return urlencode(base64_encode($currentQuery));
  }
    	
}
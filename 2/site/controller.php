<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * MPZ Search Component Controller
 */
class MpzSearchController extends JController
{
//Конструктор 
	function __construct ( $config = array (  ) )
	{
		/*
			This is not required. We can do somthing like this if needed
			if(JRequest::getCmd('view') === 'articles' && JRequest::getCmd('layout') === 'modal') {
				JHtml::_('stylesheet', 'system/adminlist.css', array(), true);
				$config['base_path'] = JPATH_COMPONENT_ADMINISTRATOR;
			}

			parent::__construct($config);
		*/
	}

	public function display($cachable = false, $urlparams = false)
	{
		parent::display ( $cachable, $urlparams );
		return $this;
	}
	
	function another_task (  ) {
		//If redirect is needed here, in controller
		//$this->setRedirect(JRoute::_('index.php?option=com_contact&view=contact&id=' . $some_variable, false));
	}
}

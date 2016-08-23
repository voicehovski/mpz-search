<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.controller');

class MpzSearchController extends JController
{
	function display($cachable = false, $urlparams = false) 
	{
		// set default view if not set
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'SearchZ'));
 
		// call parent behavior
		parent::display($cachable);
	}
}
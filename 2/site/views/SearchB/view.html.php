<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
class MpzSearchViewSearchB extends JView
{
	function display($tpl = null) 
	{
		$this->searchProfile = $this->get('SearchProfile');
 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
			return false;
		}
		
		//In the template set variables, like $this->searchProfile, are available
		parent::display($tpl);
	}
}

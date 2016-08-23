<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.view');

class MpzSearchViewSearchZ extends JView
{
	function display($tpl = null) 
	{
		//For this view we use extension of JModelList. It is created especially for work with list data
		//JModelList has the next methods, which divide list into several parts, according to list.start and list.limit fields (JModelList->getState('list.start');)
		//Child model needs to owerride only getListQuery ()
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');
 
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view. Here we assign local variables to the fields, which we can use in the template
		$this->items = $items;
		$this->pagination = $pagination;
 
		// Display the template
		parent::display($tpl);
	}
}
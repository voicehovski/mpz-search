<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class MpzSearchModelSearchZ extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery()
	{		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields. !!We should first design a table, and than can use it here and in the template
		// WARNING! IT IS ONLY DUMMY
		$query->select('id,contemt');
		$query->from('#__mpzsearch');
		return $query;
	}
}
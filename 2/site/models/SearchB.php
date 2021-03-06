<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');

class MpzSearchModelSearchB extends JModelItem
{
	protected $searchProfile;
 
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	2.5
	 */
	public function getTable($type = 'SearchB', $prefix = 'MpzSearchTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	/**
	 * Whith this metod the view can get what it want to print.
	 * The view invoke it through the proxy method get ( suffix ).
	 * While this metod get data from database, it requires the table class
	 *	resided in admin/tables/searchb.php
	 *
	 * @param  int    The corresponding id of the message to be retrieved
	 * @return string The message to be displayed to the user
	 */
	public function getSearchProfile ( $id = 1 )
	{
		if (!is_array($this->searchProfile))
		{
			$this->searchProfile = array();
		}
 
		if (!isset($this->searchProfile[$id])) 
		{
			//request the selected id
			$jinput = JFactory::getApplication()->input;
			$id = $jinput->get('id', 1, 'INT' );
 
			// Get a Table instance
			$table = $this->getTable();
 
			// Load the message
			$table->load($id);
 
			// Assign the message
			$this->searchProfile[$id] = $table->name . " " . $table->filetype;
		}
 
		return $this->searchProfile[$id];
	}
}

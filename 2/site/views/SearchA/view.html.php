<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');

class MpzSearchViewSearchA extends JView
{

	// Overwriting JView display method
	function display($tpl = null) 
	{
		//Invoke getProduct of /site/models/SearchA.php
		$this->data = $this->get ( 'Products' );
		$this->mode = $this->get ( 'Mode' );

		switch ( $this->mode ) {
			case 3:
			do_smt ( $this->data );
				break;
			case 2:
				do_smt_else ( $this->data );
				break;
			case 1:
			default:
				do_default ( $this->data );
		}

		//If redirect is needed
		//$app = JFactory::getApplication (  );
		//$app->redirect('/url/relative_to/site_root');
 
		parent::display($tpl);
	}
	
	function do_smt ( $data ) {

	}
	function do_smt_else ( $data ) {
		return $this->do_smt ( $data );
	}
	function do_default ( $data ) {
		return $this->do_smt ( $data );
	}
}

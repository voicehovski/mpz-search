<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modelitem');

class MpzSearchModelSearchA extends JModelItem
{
	protected $mode;

/*
	Модель служит для извлечения/формирования запрошенных данных
*/
	
	public function getMode()
	{
		if (!isset($this->mode)) 
		{
			//Get mode param from the query. It can be resides there while creating a menu link
			//Possible menu link params could be get from xml or database, for example
			if(!get_magic_quotes_gpc()) {
				$id = JFactory::getApplication()->input->get('id', 1, 'INT' );
			} else {
				$id = JRequest::getInt('id');
			}
			
			$this->mode = $id;		
		}
		return $this->mode;
	}
	
	//Можно использовать запрос к базе данных...
	public function getProducts (  ) {
		$db = &JFactory::getDBO();	
		//todo language support
		//$lang = &JSFactory::getLang();
		//$name = $lang->get("name");		
		//p.{$db->quoteName ( 'product_ean' )}
		$db->setQuery ( "select 1" );/*
			"select p.`product_ean`, p.`name_ru-RU`, concat(ifnull(concat(c2.`name_ru-RU`,'/'),''),c1.`name_ru-RU`) as ctg, ".
			
			"(select group_concat(av.`name_ru-RU`) from `#__jshopping_products_attr2` as pa left join `#__jshopping_attr_values` as av on pa.`attr_value_id` = av.`value_id` where pa.`product_id` = p.`product_id`)"
			
			.", round(p.`product_price`/c.`currency_value`, 2)
				from `#__jshopping_products` as p 
				left join
				`#__jshopping_products_to_categories` as pc 
				on p.`product_id` = pc.`product_id`
				left join
				`#__jshopping_categories` as c1 
				on pc.`category_id` = c1.`category_id`
				left join 
				`#__jshopping_categories` as c2 
				on c1.`category_parent_id` = c2.`category_id` 
				left join
				`#__jshopping_currencies` as c
				on c.`currency_id` = p.`currency_id`
				
			where p.`product_publish` = 1
			order by ctg"
		);*/
		//$result = $db->loadAssocList (  );
		$result = $db->loadRowList (  );
		
		$er = $db->getErrormode (  );
		if ( $er ) {
			return array($er);
		}
		
		//todo	Добавить нормальную поверку на пустой результат
		if ( ! $result ) {
			return "";
		}
		
		return $result;
	}
}

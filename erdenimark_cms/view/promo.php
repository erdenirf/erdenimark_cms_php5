<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

use ErdeniMark\Model\TableStaticpromo;

/**
 * промо акции
 */
class staticpromo {	

	/**
	 * [getPromo description]
	 * @return [type] [description]
	 */
	public static function getPromo() 
	{
		$record = (new TableStaticpromo())->fetchContentById (1);
		$id=$record['content'];
		$record = (new TableStaticpromo())->fetchContentById ($id);
		return $record['content'];
	}
	
}

?>
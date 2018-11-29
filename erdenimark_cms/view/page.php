<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 * Website: www.sibserver.org
 */

use ErdeniMark\Facade\part_page;

class page {

	/**
	 * [getPage description]
	 * @param  [type] $id     [description]
	 * @param  [type] $option [description]
	 * @return [type]         [description]
	 */
	public static function getPage($id,$option) 
	{

		return (new part_page($id));

	}
	
	/**
	 * [getParent description]
	 * @param  [type] $id     [description]
	 * @param  [type] $option [description]
	 * @return [type]         [description]
	 */
	public static function getParent($id,$option)
	{
		$page = (new part_page($id));
		if ($parent == 0) {
			return 0;
		}
		$parent = (new part_page($page->data['parent']));
		return $parent;
	}
	
	/**
	 * [getChildrensIdent description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getChildrensIdent($id)
	{
		$i=0;
		$allRows = (new TablePages())->getChildIdentsByParent($id);
		foreach ($allRows as $record)
		{
		if ($record['ident']) 
		{
		$page[$i]=$record['ident'];
		$i++;
		}
		}
		if ($i==0) $page['0']='none';
		return $page;
	}
	
	/**
	 * [getChildrens description]
	 * @param  [type] $id     [description]
	 * @param  [type] $option [description]
	 * @return [type]         [description]
	 */
	public static function getChildrens($id,$option)
	{
		$i=0;
		$allRows = (new TablePages())->getChildIdentsByParent($id);
		foreach ($allRows as $record)
		{
		if ($record['ident']) 
		{
		$page[$i]=page::getPage($record['ident'],$option);
		$i++;
		}
		}
		if ($i>0) return $page;
		else return "none";
	}
	

}


?>
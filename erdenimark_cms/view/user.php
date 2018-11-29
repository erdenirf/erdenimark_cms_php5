<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 * Website: www.sibserver.org
 */

use ErdeniMark\Model\TableUsers;

class user
{

	/**
	 * [getUserName description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getUserName($id)
	{

		$record = (new TableUsers())->fetchById ($id);
		if ($record['login']) return $record['login']; else return 'none';

	}

}

?>
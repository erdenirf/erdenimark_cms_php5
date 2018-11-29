<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 01.03.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Facade;

use ErdeniMark\Model\TablePages;

class pages_iterator {

	const BIG_PARENT = 0;

	/**
	 * [getAllParents получить список всех главных родителей]
	 * @return [type] [description]
	 */
	public static function getAllParents() {

		$massiv = (new TablePages())->fetchIdentsByParent(self::BIG_PARENT);
		foreach ($massiv as $value) {
			yield (new part_page($value['ident']));
		}

	}

	/**
	 * [getChildsOf получить список всей детей определенного родителя]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getChildsOf($id) {

		$massiv = (new TablePages())->fetchIdentsByParent($id);
		foreach ($massiv as $value) {
			yield (new part_page($value['ident']));
		}
	}

	/**
	 * [hasChilds возвращает true, если дети есть. Возвращает false, если нет детей.]
	 * @param  [type]  $id [description]
	 * @return boolean     [description]
	 */
	public static function hasChilds($id) {

		$massiv = (new TablePages())->fetchIdentsByParent($id);
		return (count($massiv) > 0);

	}

	public static function tray ($nn, $level) {

		
		
	}

}

?>
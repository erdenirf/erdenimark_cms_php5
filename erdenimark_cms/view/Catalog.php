<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

use ErdeniMark\Model\TableCatalog;

/**
 * класс для работы с каталогом Интернет-магазина
 */
class Catalog {

	/**
	 * [getAllParents description]
	 * @return [array of arrays] [description]
	 */
	public static function getAllParents() {

		return (new TableCatalog())->getFetchAllByCat(0);

	}

	/**
	 * [getAllChildrenByCat description]
	 * @param  [int] $cat [description]
	 * @return [array of arrays]      [description]
	 */
	public static function getAllChildrenByCat ($cat) {

		return (new TableCatalog())->getFetchAllByCat($cat);

	}

}

?>
<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * Класс-обертка для таблицы бд menu_name
 */
class MenuNameRow {

	public $id;
	public $name;
	public $content;
	public $level;

}

/**
 * класс Меню Названия
 */
class TableMenuName {

	/**
	 * [getRowObject description]
	 * @param  [type] $sqlQuery    [description]
	 * @param  [type] $paramsArray [description]
	 * @return [type]              [description]
	 */
	private function getRowObject ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$menuNameRow = new MenuNameRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $menuNameRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$menuNameRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $menuNameRow;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}
	
}



?>
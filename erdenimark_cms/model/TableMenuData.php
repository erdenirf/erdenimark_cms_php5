<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * Класс-обертка для таблицы бд menu_data
 */
class MenuDataRow {

	public $id;
	public $menu;
	public $header;
	public $cat;
	public $page;
	public $content;
	public $pagename;

}

/**
 * класс Меню Данные
 */
class TableMenuData {

	/**
	 * [getFetchAllByMenuAndCat description]
	 * @param  [type] $menu [description]
	 * @param  [type] $cat  [description]
	 * @return [array of arrays]       [description]
	 */
	public function getFetchAllByMenuAndCat ($menu, $cat) {

		$query = "SELECT * FROM menu_data WHERE menu = :menu AND cat = :cat ORDER BY id";

		$params = array (":menu" => $menu, ":cat" => $cat);

		$allRows = $this->getAllRows ($query, $params);

		return $allRows;

	}

	/**
	 * [getCountByMenuAndCat description]
	 * @param  [type] $menu [description]
	 * @param  [type] $cat  [description]
	 * @return [type]       [description]
	 */
	public function getCountByMenuAndCat ($menu, $cat) {

		$query = "SELECT COUNT(*) FROM menu_data WHERE menu = :menu AND cat = :cat";

		$params = array (":menu" => $menu, ":cat" => $cat);

		return $this->getCountColumn ($query, $params);

	}

	/**
	 * [getCountColumn description]
	 * @param  [type] $sqlQuery    [description]
	 * @param  [type] $paramsArray [description]
	 * @return [type]              [description]
	 */
	private function getCountColumn ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$zapros = $pdoStatement->execute ($paramsArray);
			$num_rows = $pdoStatement->fetchColumn();
			return $num_rows;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}

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
			$menuDataRow = new MenuDataRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $menuDataRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$menuDataRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $menuDataRow;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}

	/**
	 * [getAllRows description]
	 * @param  [type] $sqlQuery    [description]
	 * @param  [type] $paramsArray [description]
	 * @return [fetch array of arrays]  [description]
	 */
	private function getAllRows ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_BOTH);
			$zapros = $pdoStatement->execute($paramsArray);			
			$result = $pdoStatement->fetchAll();
			$pdoStatement->closeCursor();
			return $result;
		}
		catch (\PDOException $pe) {
			return $pe;
		}
	}

}

?>
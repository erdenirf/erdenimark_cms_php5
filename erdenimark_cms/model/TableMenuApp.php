<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * Класс-обертка для таблицы бд menu_app
 */
class MenuAppRow {

	public $id;
	public $menu;
	public $descript;
	public $src;

}

/**
 * класс Меню
 */
class TableMenuApp {

	/**
	 * [getOneByMenu description]
	 * @param  [type] $menu [description]
	 * @return [type]       [description]
	 */
	public function getOneByMenu ($menu) {

		$query = "SELECT * FROM menu_app WHERE menu = :menu";

		$params = array (":menu" => $menu);

		return $this->getRowLazy ($query, $params);

	} 

	/**
	 * [getRowLazy description]
	 * @param  [type] $sqlQuery    [description]
	 * @param  [type] $paramsArray [description]
	 * @return [type]              [description]
	 */
	private function getRowLazy ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$zapros = $pdoStatement->execute ($paramsArray);
			$rowLazy = $pdoStatement->fetch(\PDO::FETCH_LAZY);
			return $rowLazy;
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
			$menuAppRow = new MenuAppRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $menuAppRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$menuAppRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $menuAppRow;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}

}


?>
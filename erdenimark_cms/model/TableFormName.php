<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 25.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд form_name
 */
class FormNameRow {

	public $id;
	public $name;
	public $content;
	public $mail;
	public $page;
	public $submit;

}

/**
 * класс для управления запросами в таблицу бд
 */
class TableFormName {

	/**
	 * [getNameByPage description]
	 * @param  [type] $page [description]
	 * @return [type]       [description]
	 */
	public function getNameByPage ($page) {

		$query = "SELECT name FROM form_name WHERE page = :page";
		$params = array (":page" => $page);
		return $this->getRowLazy($query, $params);

	}

	/**
	 * [fetchByName description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function fetchByName ($name) {

		$query = "SELECT * FROM form_name WHERE name = :name";
		$params = array (":name" => $name);
		return $this->getRowLazy($query, $params);

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
	 * @return [object]              [description]
	 */
	private function getRowObject ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$rowObject = new FormNameRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $rowObject);
			$zapros = $pdoStatement->execute ($paramsArray);
			$rowObject = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $rowObject;
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
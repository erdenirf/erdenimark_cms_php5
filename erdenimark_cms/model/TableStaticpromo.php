<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 25.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд staticpromo
 */
class StaticpromoRow {

	public $id;
	public $content;

}

/**
 * класс для запросов в бд Промо-акции
 */
class TableStaticpromo {

	/**
	 * [fetchContentById description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function fetchContentById ($id) {

		$query = "SELECT content FROM staticpromo WHERE id = :id";
		$params = array (":id" => $id);
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
	 * @return [object]              [description]
	 */
	private function getRowObject ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$rowObject = new StaticpromoRow();
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
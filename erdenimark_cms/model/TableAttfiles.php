<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд attfiles
 */
class AttfilesRow {

	public $id;
	public $identup;
	public $href;
	public $content;

}

/**
 * класс для работы бд Аттрибуты файлов страницы
 */
class TableAttfiles {

	/**
	 * [fetchAllByIdentup description]
	 * @param  [type] $identup [description]
	 * @return [type]          [description]
	 */
	public function fetchAllByIdentup ($identup) {

		$query = "SELECT * FROM attfiles WHERE identup = :identup";

		$params = array (":identup" => $identup);

		return $this->getAllRows ($query, $params);

	}

	/**
	 * [getRowObject description]
	 * @param  [string] $sqlQuery    [description]
	 * @param  [assoc array] $paramsArray [description]
	 * @return [object]              [description]
	 */
	private function getRowObject ($sqlQuery, $paramsArray) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$attfilesRow = new AttfilesRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $attfilesRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$attfilesRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $attfilesRow;
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
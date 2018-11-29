<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд attpages
 */
class AttpagesRow {

	public $id;
	public $identup;
	public $link;
	public $content;
	public $identdown;

}

/**
 * Высокоуровневый класс - слой абстракции для низкоуровневой работы с таблицей attpages
 */
class TableAttpages {

	/**
	 * [fetchAllByIdentup description]
	 * @param  [type] $identup [description]
	 * @return [type]          [description]
	 */
	public function fetchAllByIdentup ($identup) {

		$query = "SELECT * FROM attpages WHERE identup = :identup";

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
			$attpagesRow = new AttpagesRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $attpagesRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$attpagesRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $attpagesRow;
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
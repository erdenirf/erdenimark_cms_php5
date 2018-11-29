<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 13.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд terms
 */
class TermsRow {

	public $id;
	public $ident;
	public $content;
	public $header;

}

/**
 * Класс-модель для работы с Терминами
 */
class TableTerms {

	/**
	 * [getOneByIdent description]
	 * @param  [type] $ident [description]
	 * @return [object]        [description]
	 */
	public function getOneByIdent ($ident) {

		$query = "SELECT * FROM terms WHERE ident = :ident";

		$params = array (":ident" => $ident);

		$row = $this->getRowObject ($query, $params);

		return $row;

	}

	/**
	 * [getContentByIdent description]
	 * @param  [type] $ident [description]
	 * @return [string]        [description]
	 */
	public function getContentByIdent ($ident) {

		$query = "SELECT content FROM terms WHERE ident = :ident";

		$params = array (":ident" => $ident);

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
			$termsRow = new TermsRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $termsRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$termsRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $termsRow;
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
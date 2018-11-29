<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 25.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд form_list
 */
class FormListRow {

	public $id;
	public $form;
	public $ident;
	public $type;
	public $content;
	public $value;

}

/**
 * класс для запросов бд Формы-список
 */
class TableFormList {

	/**
	 * [fetchAllByForm description]
	 * @param  [type] $form [description]
	 * @return [type]       [description]
	 */
	public function fetchAllByForm ($form) {

		$query = "SELECT * FROM form_list WHERE form = :form ORDER BY id";
		$params = array (":form" => $form);
		return $this->getAllRows ($query, $params);

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
			$rowObject = new FormListRow();
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
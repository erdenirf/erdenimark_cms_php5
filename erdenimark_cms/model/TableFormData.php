<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 25.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд form_data
 */
class FormDataRow {

	public $id;
	public $form;
	public $a1;
	public $a2;
	public $a3;
	public $a4;
	public $a5;
	public $a6;
	public $a7;
	public $a8;
	public $a9;
	public $a10;
	public $b1;
	public $b2;
	public $b3;
	public $b4;
	public $b5;
	public $b6;
	public $b7;
	public $b8;
	public $b9;
	public $b10;
	public $timenow;

}

/**
 * класс для управления запросами в бд Формы-данные
 */
class TableFormData {

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
			$rowObject = new FormDataRow();
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

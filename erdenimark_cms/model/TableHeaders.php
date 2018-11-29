<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * Класс-обертка для таблицы бд headers
 */
class HeadersRow {

	public $id;
	public $content;
	public $name;

}

/**
 * Класс для работы с Заголовками
 */
class TableHeaders {

	/**
	 * [getContentByName description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getContentByName($name) {

		$query = "SELECT content FROM headers WHERE name = :name";

		$params = array(':name' => $name);

		$row = $this->getRowObject ($query, $params);

		return $row->content;

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
			$headersRow = new HeadersRow();
			$result = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $headersRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$headersRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $headersRow;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}


}

?>
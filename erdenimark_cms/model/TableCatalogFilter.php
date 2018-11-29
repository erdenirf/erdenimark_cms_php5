<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд catalog_filter
 */
class CatalogFilterRow {

	public $id;
	public $ident;
	public $header;
	public $content;
	public $descript;
	public $createman;
	public $rewriteman;
	public $createtime;
	public $rewritetime;
	public $parent;

}

/**
 * класс-модель для Фильтров каталога для Интернет-магазина.
 */
class TableCatalogFilter {

	/**
	 * [getOneByIdent description]
	 * @param  [type] $ident [description]
	 * @return [object]        [description]
	 */
	public function getOneByIdent ($ident) {

		$query = "SELECT * FROM catalog_filter WHERE ident = :ident";

		$params = array (":ident" => $ident);

		$row = $this->getRowObject ($query, $params);

		return $row;

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
			$catalogFilterRow = new CatalogFilterRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $catalogFilterRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$catalogFilterRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $catalogFilterRow;
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
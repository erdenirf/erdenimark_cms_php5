<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка маппинг для таблицы бд catalog_filter_relations
 */
class CatalogFilterRelationsRow {

	public $id;
	public $catalog_id;
	public $catalog_filter_ident;
	public $catalog_filter_value;

}

/**
 * класс-модель для Связей отношений фильтра с каталогом для Интернет-магазина.
 */
class TableCatalogFilterRelations {

	/**
	 * [getFetchAll description]
	 * @return [array of arrays] [description]
	 */
	public function getFetchAll () {

		$query = "SELECT * FROM catalog_filter_relations";

		$params = array ();

		$all = $this->getAllRows ($query, $params);

		return $all;

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
			$catalogFilterRelationsRow = new CatalogFilterRelationsRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $catalogFilterRelationsRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$catalogFilterRelationsRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $catalogFilterRelationsRow;
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
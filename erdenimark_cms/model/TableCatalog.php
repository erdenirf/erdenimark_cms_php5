<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд catalog
 */
class CatalogRow {

	public $id;
	public $name;
	public $cat;
	public $articul;
	public $cost;
	public $bundling;
	public $img;
	public $imgs_csv;
	public $slim;
	public $col;
	public $calc;
	public $descr;
	public $type;

}

/**
 * класс для работы с Каталогом товаров для Интернет-магазина.
 */
class TableCatalog {

	/**
	 * [getFetchAllByCat description]
	 * @param  [int] $cat [description]
	 * @return [array of arrays]      [description]
	 */
	public function getFetchAllByCat ($cat) {

		$query = "SELECT * FROM catalog WHERE cat = :cat ORDER BY id";

		$params = array (":cat" => $cat);

		$all = $this->getAllRows ($query, $params);

		return $all;

	}

	/**
	 * [getOneById description]
	 * @param  [type] $id [description]
	 * @return [object]     [description]
	 */
	public function getOneById ($id) {

		$query = "SELECT * FROM catalog WHERE id = :id";
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
			$catalogRow = new CatalogRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $catalogRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$catalogRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $catalogRow;
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
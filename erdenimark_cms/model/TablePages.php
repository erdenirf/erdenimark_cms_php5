<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * Класс-обертка для маппинга таблицы бд pages
 */
class PagesRow {

	public $id;
	public $ident;
	public $header;
	public $content;
	public $descript;
	public $parent;
	public $createman;
	public $rewriteman;
	public $createtime;
	public $rewritetime;

}

/**
 * класс для работы со Страницами
 */
class TablePages {

	use ORM_methods;

	/**
	 * [fetchIdentsByParent массив из идентификаторов детей по ident родителя]
	 * @param  [type] $parent [description]
	 * @return [type]         [description]
	 */
	public function fetchIdentsByParent ($parent) {

		$query = "SELECT ident FROM pages WHERE parent = :parent";
		$params = array (":parent" => $parent);
		return $this->selectFetchAll ($query, $params);

	}

	/**
	 * [fetchByIdent description]
	 * @param  [type] $ident [description]
	 * @return [type]        [description]
	 */
	public function fetchByIdent ($ident) {

		$query = "SELECT * FROM pages WHERE ident = :ident";

		$params = array(':ident' => $ident);

		return $this->selectFetch ($query, $params);


	}


	/**
	 * [getIdByIdent description]
	 * @param  [type] $ident [description]
	 * @return [int]        [description]
	 */
	public function getIdByIdent ($ident) {

		$query = "SELECT id FROM pages WHERE ident = :ident";

		$params = array(':ident' => $ident);

		$row = $this->getRowObject ($query, $params);

		return $row->id;		

	}

	/**
	 * [getAllByIdent description]
	 * @param  [type] $ident [description]
	 * @return [object]        [description]
	 */
	public function getAllByIdent ($ident) {

		$query = "SELECT * FROM pages WHERE ident = :ident";

		$params = array(':ident' => $ident);

		return $this->selectFetchAll ($query, $params);


	}

	/**
	 * [getHeaderByIdent description]
	 * @param  [type] $ident [description]
	 * @return [string]        [description]
	 */
	public function getHeaderByIdent($ident) {

		$query = "SELECT header FROM pages WHERE ident = :ident";

		$params = array(':ident' => $ident);

		$row = $this->getRowObject ($query, $params);

		return $row->header;

	}

	/**
	 * [getChildIdentsByParent description]
	 * @param  [type] $parent [description]
	 * @return [fetch array of arrays]         [description]
	 */
	public function getChildIdentsByParent ($parent) {

		$query = "SELECT ident FROM pages WHERE parent = :parent";

		$params = array(":parent" => $parent);

		$allRows = $this->selectFetchAll ($query, $params);

		return $allRows;

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
			$pagesRow = new PagesRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $pagesRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$pagesRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $pagesRow;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}

	


}


?>
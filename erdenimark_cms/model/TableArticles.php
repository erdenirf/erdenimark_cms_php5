<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 13.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд articles
 */
class ArticlesRow {

	public $id;
	public $header;
	public $descript;
	public $content;
	public $createman;
	public $createtime;
	public $src1;
	public $src2;
	public $src3;
	public $href;
	public $link;

}

/**
 * Класс-Модель для управления Статьями.
 */
class TableArticles {

	/**
	 * [getOneById description]
	 * @param  [type] $id [description]
	 * @return [object]     [description]
	 */
	public function getOneById ($id) {

		$query = "SELECT * FROM articles WHERE id = :id";

		$params = array (":id" => $id);

		$row = $this->getRowObject ($query, $params);

		return $row;

	}

	/**
	 * [getAllWithoutContent description]
	 * @return [array of arrays] [description]
	 */
	public function getAllWithoutContent() {

		$query = "SELECT id,header,descript,createman,createtime,src1,src2,src3,href,link FROM articles";

		$params = array ();

		$allRows = $this->getAllRows ($query, $params);

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
			$articlesRow = new ArticlesRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $articlesRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$articlesRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $articlesRow;
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
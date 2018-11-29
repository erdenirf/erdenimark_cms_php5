<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд banners
 */
class BannersRow {

	public $id;
	public $header;
	public $src;
	public $href;
	public $link;

}

/**
 * Класс-модель для работы с Баннерами.
 */
class TableBanners {

	/**
	 * [getBannerById description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getBannerById ($id) {

		$query = "SELECT * FROM banners WHERE id = :id";

		$params = array (":id" => $id);

		$row = $this->getRowLazy ($query, $params);

		return $row;

	}

	/**
	 * [getAllBanners description]
	 * @return [type] [description]
	 */
	public function getAllBanners () {

		$query = "SELECT * FROM banners ORDER BY id DESC";

		$params = array ();

		$allRows = $this->getAllRows ($query, $params);

		return $allRows;

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
			$bannersRow = new BannersRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $bannersRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$bannersRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $bannersRow;
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
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_ASSOC);
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
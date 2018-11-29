<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 13.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд photogallery
 */
class PhotogalleryRow {

	public $id;
	public $name;
	public $cat;
	public $img;
	public $date;

}

/**
 * класс-модель для работы с Фотогалереями с подкатегориями
 */
class TablePhotogallery {

	/**
	 * [getFetchAllByCat description]
	 * @param  [type] $cat [description]
	 * @return [array of arrays]      [description]
	 */
	public function getFetchAllByCat ($cat) {

		$query = "SELECT * FROM photogallery WHERE cat = :cat";

		$params = array (":cat" => $cat);

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
			$photogalleryRow = new PhotogalleryRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $photogalleryRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$photogalleryRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $photogalleryRow;
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
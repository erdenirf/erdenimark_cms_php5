<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд slider
 */
class SliderRow {

	public $id;
	public $img;

}

/**
 * Модель для работы с картинками Слайдеры
 */
class TableSlider {

	/**
	 * [fetchById description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function fetchById ($id) {

		$query = "SELECT * FROM slider WHERE id = :id";

		$params = array (":id" => $id);

		return $this->getRowLazy ($query, $params);

	}

	/**
	 * [getFetchAll description]
	 * @return [array of arrays] [description]
	 */
	public function getFetchAll() {

		$query = "SELECT * FROM slider";

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
			$sliderRow = new SliderRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $sliderRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$sliderRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $sliderRow;
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
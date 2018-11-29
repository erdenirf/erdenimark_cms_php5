<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка маппинг для таблицы бд faq
 */
class FaqRow {

	public $id;
	public $quastion;
	public $answer;
	public $ch;
	public $date;
	public $fio;

}

/**
 * Класс-модель для Вопросов и Ответов
 */
class TableFaq {

	/**
	 * [getOneById description]
	 * @param  [type] $id [description]
	 * @return [object]     [description]
	 */
	public function getOneById ($id) {

		$query = "SELECT * FROM faq WHERE id = :id";

		$params = array (":id" => $id);

		$row = $this->getRowObject ($query, $params);

		return $row;

	}

	/**
	 * [getFetchAll description]
	 * @return [array of arrays] [description]
	 */
	public function getFetchAll () {

		$query = "SELECT * FROM faq";

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
			$faqRow = new FaqRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $faqRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$faqRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $faqRow;
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
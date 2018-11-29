<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд client_hosting
 */
class ClientHostingRow {

	public $hosting_id;
	public $hosting_login;
	public $hosting_site_id;
	public $hosting_status;
	public $hosting_date_start;
	public $hosting_date_end;
	public $hosting_price;

}

/**
 * Класс для запросов в бд для Хостинга клиентов
 */
class TableClientHosting {

	/**
	 * [getOneByHostingId description]
	 * @param  [type] $hostingId [description]
	 * @return [object]            [description]
	 */
	public function getOneByHostingId ($hostingId) {

		$query = "SELECT * FROM client_hosting WHERE hosting_id = :hosting_id";

		$params = array (":hosting_id" => $hostingId);

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
			$clientHostingRow = new ClientHostingRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $clientHostingRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$clientHostingRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $clientHostingRow;
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
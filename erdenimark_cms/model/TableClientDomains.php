<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 */

namespace ErdeniMark\Model;

/**
 * класс-обертка для таблицы бд client_domains
 */
class ClientDomainsRow {

	public $domain_id;
	public $login;
	public $domain_name;
	public $domain_status;
	public $domain_date_start;
	public $domain_date_end;
	public $domain_price;
	public $domain_dns;

}

/**
 * класс для работы с Доменами клиентов
 */
class TableClientDomains {

	/**
	 * [getOneByDomainId description]
	 * @param  [int] $domainId [description]
	 * @return [object]           [description]
	 */
	public function getOneByDomainId ($domainId) {

		$query = "SELECT * FROM client_domains WHERE domain_id = :domain_id";

		$params = array (":domain_id" => $domainId);

		$row = $this->getRowObject ($query, $params);

		return $row;

	}

	/**
	 * [getFetchAll description]
	 * @return [array of arrays] [description]
	 */
	public function getFetchAll () {

		$query = "SELECT * FROM client_domain";

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
			$clientDomainsRow = new ClientDomainsRow();
			$settings = $pdoStatement->setFetchMode (\PDO::FETCH_INTO, $clientDomainsRow);
			$zapros = $pdoStatement->execute ($paramsArray);
			$clientDomainsRow = $pdoStatement->fetch(\PDO::FETCH_INTO);
			$pdoStatement->closeCursor();
			return $clientDomainsRow;
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
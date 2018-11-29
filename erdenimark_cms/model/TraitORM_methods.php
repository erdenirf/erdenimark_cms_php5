<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 01.03.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * ORM - обертка для функций CRUD-методологии для запросов в базу данных
 * функции для уменьшения дублирования кода, содержит: SELECT, INSERT, UPDATE, REMOVE
 */
trait ORM_methods {

	/**
	 * [selectFetch description]
	 * @param  [type] $sqlQuery    [description]
	 * @param  [type] $paramsArray [description]
	 * @return [type]              [description]
	 */
	private function selectFetch ($sqlQuery, $paramsArray, $setFetch = \PDO::FETCH_LAZY) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$zapros = $pdoStatement->execute ($paramsArray);
			$settings = $pdoStatement->setFetchMode ($setFetch);
			$row = $pdoStatement->fetch();
			return $row;
		}
		catch (\PDOException $pe) {
			return $pe;
		}

	}

	/**
	 * [selectFetchAll description]
	 * @param  [type] $sqlQuery    [description]
	 * @param  [type] $paramsArray [description]
	 * @return [type]              [description]
	 */
	private function selectFetchAll ($sqlQuery, $paramsArray, $setFetch = \PDO::FETCH_ASSOC) {

		$pdo = DatabasePdo::getInstance();

		try {
			$pdoStatement = $pdo->prepare ($sqlQuery);
			$settings = $pdoStatement->setFetchMode ($setFetch);
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
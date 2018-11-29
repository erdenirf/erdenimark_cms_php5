<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Facade;

use ErdeniMark\Model\TableHeaders;

/**
 * класс-прослойка для работы с Заголовками. 
 * Используйте этот класс из Вида для представления, из Контроллера для изменения.
 */
class Headers {

	// константы
	const KEYWORDS = "keywords";
	const DESCRIPTION = "description";
	const TITLE = "title";

	/**
	 * [getKeywords description]
	 * @return [type] [description]
	 */
	public static function getKeywords() {

		return (new TableHeaders())->getContentByName (self::KEYWORDS);

	}

	/**
	 * [getDescription description]
	 * @return [type] [description]
	 */
	public static function getDescription() {

		return (new TableHeaders())->getContentByName (self::DESCRIPTION);

	}

	/**
	 * [getTitle description]
	 * @return [type] [description]
	 */
	public static function getTitle() {

		return (new TableHeaders())->getContentByName (self::TITLE);

	}

}


?>
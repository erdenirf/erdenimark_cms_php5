<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 01.03.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Controller;

/**
 * Здесь логин и пароль для админки
 */
class AdminConfig {
	/**
	 * Конфигурационные данные для авторизации в админ-панель
	 */
	private static $login = "admin";

	private static $password = "G2dwKMar";

	/**
	 * Получить логин
	 */
	protected static function getLogin() {
		return self::$login;
	}

	/**
	 * Получить пароль
	 */
	protected static function getPassword() {
		return self::$password;
	}

}


?>
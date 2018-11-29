<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 01.03.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Controller;

/**
*	Класс, для авторизации в админ-панель
*/
class AdminAuthorization extends AdminConfig {
	/**
	*	проверка статуса на авторизацию 
	*/
	public static function Is_authorized() {
		$truedata=self::hash_generate(parent::getLogin(), parent::getPassword());
		if ($_SESSION['pass']==$truedata) {
			return true;
		}
		return false;
	}
	/**
	*	обработка пост запроса логин и пароль
	*/
	public static function Request_method_post_check_login_password() {
		$post_alogin=(trim(htmlspecialchars($_POST['alogin'])));
		$post_apass=(trim(htmlspecialchars($_POST['apass'])));
		if ($_SERVER['REQUEST_METHOD']=='POST' && $post_alogin && $post_apass) 
		{
			if (!(self::Is_authorized())) {
				$_SESSION['autoreport']='Доступ закрыт!';
				sleep(1);			//задержка на 1 сек, после неправильной комбинации логин/пароль
			}
		$_SESSION['login']=$post_alogin; 
		$_SESSION['pass']=self::hash_generate($post_alogin, $post_apass);
		}
	}
	/**
	*	Выход из аккаунта 
	*/
	public static function Unlogin() {
		$_SESSION['autoreport']='Вы вышли! До свидания!'; 
		$_SESSION['login']='none'; 
		$_SESSION['pass']='none';
	}
	/**
	 * Генерируем хеш-код
	 */
	private static function hash_generate ($username, $password) {
		return md5(strtolower($username).md5($password));
	}
}

?>
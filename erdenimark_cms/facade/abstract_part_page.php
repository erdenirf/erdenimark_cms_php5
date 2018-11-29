<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 01.03.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Facade;

/**
 * абстрактный класс, который хранит поля и свойства Страницы
 */
abstract class abstract_part_page {

	// массив с данными страницы
	public $data = array ('ident' => 'none', 'topic' => 'none', 'small' => 'none', 'big' => 'none',
					   'parent' => 'none', 'parentname' => 'none');
	// массив, хранящий дату создания, дату редактирования и пользователя
	public $stat = array ('createuser' => 'none', 'createtime' => 'none', 'rewriteuser' => 'none', 'rewritetime' => 'none');
	// массив, хранящий атрибуты и прикрепленные файлы к странице
	public $module = array ('attpages' => 'none', 'attfiles' => 'none');

}

?>
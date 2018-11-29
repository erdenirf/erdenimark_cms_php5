<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 27.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Facade;

use ErdeniMark\Model\TableFormName;

/**
 * Класс для представления формы из Модели для контроллера и вида
 */
class part_form
{
	/**
	 * [$data description]
	 * @var array
	 */
	public $data = array ('name' => 'none', 'content' => 'none', 'page' => 'none', 'submit' => 'none', 'mail' => 'none');

	/**
	 * [__construct конструктор с параметрами]
	 * @param [type] $ident [description]
	 */
	public function __construct($ident) {

		$record = (new TableFormName())->fetchByName($ident);
		if ($record)
		{
			$this->data['ident']=$record['name'];
			$this->data['topic']=$record['content'];
			$this->data['page']=$record['page'];
			$this->data['submit']=$record['submit'];
			$this->data['mail']=$record['mail'];
			$this->data['code']="<input name=".$ident." type=submit value=\"".$record['submit']."\">";
		}
		return $this;

	}
}

?>
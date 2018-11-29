<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

use ErdeniMark\Facade\Headers;
use ErdeniMark\Facade\part_page;

/**
 * Класс этот отвечает за начальную прорисовку Заголовков и Страницы сайта
 */
class scr {

	/**
	 * [loadPage description]
	 * @return [void] [description]
	 */
	public static function loadPage() 
	{
		global $WAY, $PAGE;
		include($WAY . '/index.php');
	}

	/**
	 * [loadHeaders description]
	 * @param  [type] $option [description]
	 * @return [void]         [description]
	 */
	public static function loadHeaders($option) 
	{
		global $WAY;
		switch ($option)
		{
			case '1':
				require($WAY.'/headers.php');
			break;
			case '2':
				echo '<meta content="'.Headers::getKeywords().'" name=keywords>';
				echo '<meta content="'.Headers::getDescription().'" name=description>';
				include($WAY.'/headers.php');
			break;
		}
	}

	/**
	 * [startPage description]
	 * @return [void] [description]
	 */
	public static function startPage()
	{
		global $PAGE, $GENERAL;
		$topic = (new part_page($PAGE))->data['topic'];
		if ($topic == "none") {
			$PAGE = $GENERAL['page'];
		}
	}

	/**
	 * [title description]
	 * @return [void] [description]
	 */
	public static function title() 
	{
		global $PAGE;
		$topic = (new part_page($PAGE))->data['topic'];
		echo '<title>'.$topic.' / '.Headers::getTitle().'</title>';
	}

}

?>
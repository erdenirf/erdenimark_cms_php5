<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

use ErdeniMark\Model\TableSlider;

/**
 * класс для картинок-слайдеров
 */
class slider {

	/**
	 * [getSlider description]
	 * @param  [type] $id [description]
	 * @return [part_slider]     [description]
	 */
	public static function getSlider($id) 
	{
		$newslider=new part_slider();
		$record = (new TableSlider())->fetchById ($id);
		if ($record)
		{
			$newslider->data['id']=$record['id'];
			$newslider->data['img']=$record['img'];
		}
		return $newslider;
	}
	
	/**
	 * [getAllSliders description]
	 * @return [array of part_slider] [description]
	 */
	public static function getAllSliders() 
	{
		$i=0;
		$all = (new TableSlider())->getFetchAll();
		foreach ($all as $record)
		{
			$newslider[$i]=new part_slider();
			if ($record)
			{
				$newslider[$i]->data['id']=$record['id'];
				$newslider[$i]->data['img']=$record['img'];
			}
			$i++;
		}
		return $newslider;
	}
}

class part_slider
{
	var $data = array ('id' => 'none', 'img' => 'none');
}

?>
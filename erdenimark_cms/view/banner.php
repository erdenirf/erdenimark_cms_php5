<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

use ErdeniMark\Model\TableBanners;

class banner {

	public static function getBanner($id) 
	{
		$newbanner=new part_banner();
		$record = (new TableBanners())->getBannerById ($id);
		if ($record)
		{
			$newbanner->data['id']=$record['id'];
			$newbanner->data['topic']=$record['header'];
			$newbanner->data['img']=$record['src'];
			$newbanner->data['href']=$record['href'];
			if ($record['href']=='1')
			{
				$newbanner->data['link']="index.php?page=".$record['link'];
			} 
			else
			{
				$newbanner->data['link']=$record['link'];
			}
		}
		return $newbanner;
	}
	
	public static function getAllBanners() 
	{	
		$i=0;
		$banners = (new TableBanners())->getAllBanners();
		foreach ($banners as $record)
		{
			$newbanner[$i]=new part_banner();
			if ($record)
			{
				$newbanner[$i]->data['id']=$record['id'];
				$newbanner[$i]->data['topic']=$record['header'];
				$newbanner[$i]->data['img']=$record['src'];
				$newbanner[$i]->data['href']=$record['href'];
				if ($record['href']=='1')
				{
					$newbanner[$i]->data['link']="index.php?page=".$record['link'];
				} 
				else
				{
					$newbanner[$i]->data['link']=$record['link'];
				}
			}
			$i++;
		}
		return $newbanner;
	}
}

class part_banner
{
	var $data = array ('id' => 'none', 'topic' => 'none', 'href' => 'none', 'link' => 'none', 'img' => 'none');
}

?>
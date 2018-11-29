<?

use ErdeniMark\Facade\part_page;
use ErdeniMark\Model\TableMenuData;
use ErdneiMark\Model\TableMenuApp;

class menu {

	public static function getMenu($menu,$id,$option)
	{
		$allmenus = (new TableMenuData())->getFetchAllByMenuAndCat($menu, $id);
		$i=0;
		foreach ($allmenus as $record )
		{
		    if ($record['page'])
			{
				$menus[$i]=new part_menu;
				$topic = (new part_page($record['page']))->data['topic'];
				if ($record['header'] && $record['pagename']==0) $menus[$i]->data['text']=$record['header'];
				else $menus[$i]->data['text']=$topic;
				$menus[$i]->data['href']="index.php?page=".$record['page'];
				$menus[$i]->data['menu']=$menu;
				$menus[$i]->data['parent']=$record['cat'];
				$menus[$i]->data['id']=$record['id'];
				$row_col = (new TableMenuData())->getCountByMenuAndCat($menu, $record['id']);
				if ($row_col) $menus[$i]->data['lastlevel']=1;
				if ($option==2)
				{
				$record2 = (new TableMenuApp())->getOneByMenu ($record['id']);
				$menus[$i]->module['descript']=$record2['descript'];
				$menus[$i]->module['src']=$record2['src'];
				}
				$i++;
			}
			elseif ($record['content'])
			{
				$menus[$i]=new part_menu;
				if ($record['header']) $menus[$i]->data['text']=$record['header'];
				else $menus[$i]->data['text']=$record['content'];
				$menus[$i]->data['href']=$record['content'];
				$menus[$i]->data['menu']=$menu;
				$menus[$i]->data['parent']=$record['cat'];
				$menus[$i]->data['id']=$record['id'];
				$row_col = (new TableMenuData())->getCountByMenuAndCat($menu, $record['id']);
				if ($row_col) $menus[$i]->data['lastlevel']=1;
				if ($option==2)
				{
				$record2 = (new TableMenuApp())->getOneByMenu ($record['id']);
				$menus[$i]->module['descript']=$record2['descript'];
				$menus[$i]->module['src']=$record2['src'];
				}
				$i++;
			}
			
		}
		if ($i==0) $menus[0]=new part_menu;
		return $menus;
	}
}

class part_menu
{
	var $data = array('id' => 0, 'text' => 'none', 'menu' => 'none', 'parent' => 'none', 'href' => 'none', 'lastlevel' => '0');
	var $module = array('descript' => 'none', 'src' => 'none');

	}

?>
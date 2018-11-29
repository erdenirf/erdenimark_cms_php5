<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 01.03.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Facade;

use ErdeniMark\Model\TablePages;
use ErdeniMark\Model\TableAttpages;
use ErdeniMark\Model\TableAttfiles;
use ErdeniMark\Model\TableUsers;

/**
 * класс, который хранит данные Страницы в виде объекта
 */
class part_page extends abstract_part_page
{

	/**
	 * [__construct description]
	 * @param [type] $pagename [description]
	 */
	public function __construct($pagename) {

		$record = (new TablePages())->fetchByIdent ($pagename);
		if ($record)
		{
			$this->data['ident']=$record['ident'];
			$this->data['topic']=$record['header'];
			$this->data['small']=$record['descript'];
			$this->data['big']=$record['content'];
			$this->data['parent']=$record['parent'];
			$this->data['parentname']=$this->getPageName($record['parent']);
			$this->module['attpages']=$this->getAttPages($pagename);
			$this->module['attfiles']=$this->getAttFiles($pagename);
			$this->stat['createtime']=$record['createtime'];
			$this->stat['rewritetime']=$record['rewritetime'];
			$this->stat['createuser']=$this->getUserName($record['createman']);
			$this->stat['rewriteuser']=$this->getUserName($record['rewriteman']);
		}
		else
		{
			$this->module['attpages']=array (array('href' => 'none', 'text' => 'none'));
			$this->module['attfiles']=array (array('href' => 'none', 'text' => 'none'));
		}
		return $this;

	}

	/**
	 * [getPageName description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function getPageName($id)
	{
		$record = (new TablePages())->fetchByIdent ($id);
		if ($record) return $record['header'];
		return "none";
	}

	/**
	 * [getAttPages description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function getAttPages($id)
	{
		$i=0;
		$allRows = (new TableAttpages())->fetchAllByIdentup($id);
		foreach ($allRows as $record)
		{
			if ($record['identdown']) 
			{
				$attp[$i]['href']="index.php?page=".$record['identdown'];
				if ($record['content']) $attp[$i]['text']=$record['content'];
				else $attp[$i]['text']=$attp[$i]['href'];
				$i++;
			}
			elseif ($record['link'])
			{
				$attp[$i]['href']=$record['link'];
				if ($record['content']) $attp[$i]['text']=$record['content'];
				else $attp[$i]['text']=$attp[$i]['href'];
				$i++;
			}

		}
		if ($i>0) return $attp;
		else 
		{
			$attp[0]['text']='';
			$attp[0]['href']='';
			return $attp;
		}
	}

	/**
	 * [getAttFiles description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function getAttFiles($id)
	{
		$i=0;
		$allRows = (new TableAttfiles())->fetchAllByIdentup ($id);
		foreach ($allRows as $record)
		{
			if ($record['href']) 
			{
				$attf[$i]['href']=$record['href'];
				if ($record['content']) $attf[$i]['text']=$record['content'];
				else $attf[$i]['text']=$attf[$i]['href'];
				$i++;
			}
		}
		if ($i>0) return $attf;
		else 
		{
			$attf[0]['text']='';
			$attf[0]['href']='';
			return $attf;
		}
	}

	/**
	 * [getUserName description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function getUserName($id)
	{

		$record = (new TableUsers())->fetchById ($id);
		if ($record['login']) return $record['login']; else return 'none';

	}

}

?>
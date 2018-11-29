<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 24.02.2018
 */

use ErdeniMark\Model\TableTerms;

/**
 * класс Термины
 */
class term
{
	function getTerm($id)
	{
		$record = (new TableTerms())->getContentByIdent ($id);
		if ($record['content']) return $record['content']; else return 'none';
	}
}

?>
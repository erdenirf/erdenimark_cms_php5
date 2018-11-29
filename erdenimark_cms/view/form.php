<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 25.02.2018
 * Website: www.sibserver.org
 */

use ErdeniMark\Facade\part_form;
use ErdeniMark\Model\TableFormName;
use ErdeniMark\Model\TableFormList;
use ErdeniMark\Model\TableCatalog;

/**
 * класс-фасад для единого доступа к данным Формы и манипулирования ими
 */
class form {
	
	/**
	 * [getFormPage description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getFormPage($id) 
	{
		$record = (new TableFormName())->getNameByPage($id);
		if ($record) return $record['name'];
		else return 0;
	}
	
	/**
	 * [getForm description]
	 * @param  [type] $ident [description]
	 * @return [type]        [description]
	 */
	public static function getForm($ident) 
	{

		return (new part_form($ident));
		
	}
	
	public static function formStart($ident)
	{
		$ident=trim(htmlspecialchars($ident));
		echo '<form action="" method=POST name='.$id.'>';
		$_SESSION['click']=1;
	}
	
	public static function formStop($ident)
	{
		echo '</form>';
	}
	
	public static function getFormRows($ident) 
	{
				$i=0;
				$ident=trim(htmlspecialchars($ident));
				$forms = (new TableFormList())->fetchAllByForm ($ident);
				foreach ($forms as $record)
				{
					if ($record)
					{
						$newform[$i]=new part_form_row();
						$newform[$i]->data['form']=$record['form'];
						$newform[$i]->data['ident']=$record['ident'];
						$newform[$i]->data['type']=$record['type'];
						$newform[$i]->data['content']=$record['content'];
						$newform[$i]->data['value']=$record['value'];
						$code=0;
						if (($record['type']=='text') || ($record['type']=='password')) 
							{
								$v=trim(htmlspecialchars($_POST[$record['ident']]));
								$code="<input required type=".$record['type']." name=".$record['ident']." value=".$v.">";
							}
						elseif ($record['type']=='checkbox') 
							{
								$v=trim(htmlspecialchars($_POST[$record['ident']]));
								if ($v=='on') $code="<input type=".$record['type']." name=".$record['ident']." checked>";
								else $code="<input type=".$record['type']." name=".$record['ident'].">";
							}
						elseif ($record['type']=='textarea')
							{
								$v=trim(htmlspecialchars($_POST[$record['ident']]));
								$code="<textarea name=".$record['ident'].">".$v."</textarea>";
							}
						elseif ($record['type']=='select')
							{
								$v=trim(htmlspecialchars($_POST[$record['ident']]));
								$code="<select name=".$record['ident'].">";
								$a=$record['value'];
								{
									$l=strlen($a);
									while ($l>0)
									{
										$s=0;
										$f=strpos($a,":");
										$b=substr($a,$s,$f);
										$a=substr($a,$f+1);
										$l=strlen($a);
										$code.="<option value=\"".$b."\"";
										if ($v==$b) $code.=" selected ";
										$code.=">".$b."</option>";
									}
								}
								$code.="</select>";
								
							}
						$newform[$i]->data['code']=$code;
					}
				$i++;
				}
		return $newform;
	}
	
	/**
	 * [send description]
	 * @param  [type] $ident [description]
	 * @param  [type] $mail  [description]
	 * @param  [type] $mail2 [description]
	 * @return [type]        [description]
	 */
	public static function send($ident,$mail,$mail2) 
	{
		global $_SESSION;
		if ($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['click'])
		{
			$_SESSION['click']=0;
				$i=0;
				$ident=trim(htmlspecialchars($ident));
				$allForms = (new TableFormList())->fetchAllByForm ($ident);
				foreach ($allForms as $record)
				if ($record)
				{
					$s['in'][$i]=$record['content'];
					if ($record['type']=='checkbox')
					{
						if ($_POST[$record['ident']]=='on') $s['out'][$i]="Да";
						else $s['out'][$i]="Нет";
					} else $s['out'][$i]=trim(htmlspecialchars($_POST[$record['ident']]));
							
					$i++;
				}
				if ($ident=='card')
				{
						$summ=$_SESSION['summ'];
						$col=$_SESSION['col2'];
						for($i=1;$i<=$_SESSION['col'];$i++){	
							$cartid=$_SESSION['cartid'][$i];
							$cartcol=$_SESSION['cartcol'][$i];
							$cartwidth=$_SESSION['width'][$i];	
							$cartheight=$_SESSION['height'][$i];
							$cartsize=$_SESSION['cartsize'][$i];

							if($cartcol!=0){
								$rrr = (new TableCatalog())->getOneById($cartid);
								$tovid=$tovid.$cartid.':';
								$tovcol=$tovcol.$cartcol.':';
								$tovwidth=$tovwidth.$cartwidth.':';
								$tovheight=$tovheight.$cartheight.':';
								$tovsize=$tovsize.$cartsize.':';							
							}
						}
						$s['in'][9]="Товары";
						$s['out'][9]=$tovid;
						$s['out'][8]=$tovcol;
						$s['out'][7]=$tovwidth;
						$s['out'][6]=$tovheight;
						$s['out'][5]=$tovsize;
				}
				if ($i)
				{
					$timenow=time();
					mysql_query("INSERT INTO form_data (form, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, b1, b2, b3, b4, b5, b6, b7, b8, b9, b10, timenow)
					VALUES ('$ident','".$s['in'][0]."','".$s['in'][1]."','".$s['in'][2]."','".$s['in'][3]."','".$s['in'][4]."','".$s['in'][5]."','".$s['in'][6]."','".$s['in'][7]."','".$s['in'][8]."','".$s['in'][9]."',
					'".$s['out'][0]."','".$s['out'][1]."','".$s['out'][2]."','".$s['out'][3]."','".$s['out'][4]."','".$s['out'][5]."','".$s['out'][6]."','".$s['out'][7]."','".$s['out'][8]."','".$s['out'][9]."','$timenow')",$DATA1);	
					$result="Спасибо, ваши данные отправлены";

						if ($ident=='card'){
							$mailer = new PHPMailer();
							$mailer->From = 'send@kidswalk.ru';
							$mailer->FromName = 'Интернет-магазин детской одежды Весело Гулять';
							$mailer->Subject = 'Новая заявка с сайта - Весело Гулять';
							$mailer->AddAddress($mail);
							$mailer->IsHTML(true);
							$mailer->ContentType = 'text/html';
							$mailer->CharSet = 'UTF-8';
							$mailer->SetLanguage('ru');
							$asd=getArray($tovid);
							$bsd=getArray($tovcol);
							$widthsd=getArray($tovwidth);
							$heightsd=getArray($tovheight);
							$sizesd=getArray($tovsize);

							$i=0;
							$tovar='';
							$summ=0;
							foreach ($asd as $element){
								if($element){
									$i++;
									$qcar=mysql_query("SELECT * FROM catalog where id='$element' ORDER BY id", $DATA1);
									$rcar=mysql_fetch_array($qcar);
										$prz=$rcar['cost']*$bsd[$i];
										$tovar.='<em>Товар:</em> '.$rcar['name'].', <em>Размер:</em> '.$sizesd[$i].', <em>Количество:</em> '.$bsd[$i].', <em>На сумму:</em> '.$prz.' руб.<br>';
										$summ=$summ+$prz;
								}
							}
							$strbody = '';
							for ($i=0;$i<=9;$i++) {				//циклом проходим по всем полям (макс. 10 шт)
								if ($s['in'][$i]) {				//проверяем на то, что есть это поле.
									$strbody .= $s['in'][$i].': '.$s['out'][$i].'<br/><br/>';		//выводим <описание поля>: <значение поля>
								}
							}
							$strbody .= 'Дата добавления: '.getFormatDate($timenow).'<br/><br/>';
							$mailer->Body = 'Здравствуйте!<br><br>
							'.$tovar.'<br>
							<strong>Итого</strong>: '.$summ.' руб.<br><br>'.$strbody;		
							$_SESSION['col']=0;
							$mailer->Send();
						}
					
				} else $result="Извините, во время отправки данных возникли ошибки";
				return $result;
		}
		else return 0;
	}
		
}

?>
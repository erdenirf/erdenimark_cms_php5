<head>
<? 
scr::loadHeaders(2); 
echo '<hr><h2>Вызов scr::loadHeaders(2) - загрузка заголовоков из headers.php и базы данных (1-только headers.php)</h2>';
?>

<? 
scr::startPage(); 
echo '<hr><h2>Вызов scr::startPage()  - Определяет зарезервированную переменную $PAGE, либо идентификатором текущей страницы, либо стартовой страницей</h2>';
?>

<? 
scr::title();
echo '<hr><h2>Вызов scr::title()  - Определяет заголовок страницы</h2>';
?>

</head>
<body>
<br>

<?  
$page=page::getPage("about",1); 
echo '<hr><h2>Вызов page::getPage("идентификатор", 1) - получить страницу</h2>';
echo '<div style="background-color:#eeeeee;"><b>Идентификатор</b>: '.$page->data['ident'];
echo '<br><b>Заголовок</b>: '.$page->data['topic'];
echo '<br><b>Полное описание</b>: '.$page->data['big'];
echo '<br><b>Кракое описание</b>: '.$page->data['small'];
echo '<br><b>Идентификатор родительской страницы</b>: '.$page->data['parent'];
echo '<br><b>Заголовок родительской страницы</b>: '.$page->data['parentname'];
echo '<br><b>Страницу добавил</b>: '.$page->stat['createuser'].' - '.getFormatDate($page->stat['createtime']);
echo '<br><b>Страницу отредактировал</b>: '.$page->stat['rewriteuser'].' - '.getFormatDate($page->stat['rewritetime']);
echo '</div><br>';
?>

<?  
$page2=page::getParent("about",1); 
echo '<hr><h2>Вызов page::getParent("идентификатор", 1) - получить страницу родителя</h2>';
echo '<div style="background-color:#eeeeee;"><b>Идентификатор</b>: '.$page2->data['ident'];
echo '<br><b>Заголовок</b>: '.$page2->data['topic'];
echo '<br><b>Полное описание</b>: '.$page2->data['big'];
echo '<br><b>Кракое описание</b>: '.$page2->data['small'];
echo '<br><b>Идентификатор родительской страницы</b>: '.$page2->data['parent'];
echo '<br><b>Заголовок родительской страницы</b>: '.$page2->data['parentname'];
echo '<br><b>Страницу добавил</b>: '.$page2->stat['createuser'].' - '.getFormatDate($page2->stat['createtime']);
echo '<br><b>Страницу отредактировал</b>: '.$page2->stat['rewriteuser'].' - '.getFormatDate($page2->stat['rewritetime']);
echo '</div><br>';
?>

<?  
$page3=page::getChildrensIdent("general"); 
echo '<hr><h2>Вызов page::getChildrensIdent("идентификатор") - получить идентификаторы страниц наследников</h2>';
foreach ($page3 as $element) echo $element.'<br>';
?>

<?  
$page4=page::getChildrens("general",1); 
echo '<hr><h2>Вызов page::getChildrens("идентификатор", 1) - получить страницы наследников</h2><div style="background-color:#eeeeee;">';
foreach ($page4 as $element)
{
echo '<br>';
echo '<b>Идентификатор</b>: '.$element->data['ident'];
echo '<br><b>Заголовок</b>: '.$element->data['topic'];
echo '<br><b>Полное описание</b>: '.$element->data['big'];
echo '<br><b>Кракое описание</b>: '.$element->data['small'];
echo '<br><b>Идентификатор родительской страницы</b>: '.$element->data['parent'];
echo '<br><b>Заголовок родительской страницы</b>: '.$element->data['parentname'];
echo '<br><b>Страницу добавил</b>: '.$element->stat['createuser'].' - '.getFormatDate($element->stat['createtime']);
echo '<br><b>Страницу отредактировал</b>: '.$element->stat['rewriteuser'].' - '.getFormatDate($element->stat['rewritetime']);
echo '<br>';
}
echo '</div><br>';
?>


<?  
$menu1=menu::getMenu("generalmenu",0,1); 
echo '<hr><h2>Вызов menu::getMenu("идентификатор", "корень [0,int]", 1) - получить уровень меню без дополнительнх модулей</h2><div style="background-color:#eeeeee;">';
foreach ($menu1 as $element) 
{
	echo '<a href='.$element->data['href'].'>'.$element->data['text'].'</a><br>';
		if ($element->data['lastlevel']=='1')
			{
				$menu2=menu::getMenu("generalmenu",$element->data['id'],1); 
				foreach ($menu2 as $element2) echo '&nbsp;&nbsp;&nbsp;-&nbsp;<a href='.$element2->data['href'].'>'.$element2->data['text'].'</a><br>';
			}
}
echo '</div><br>';
?>

<?  
$term1=term::getTerm("phone"); 
$term2=term::getTerm("adress"); 
echo '<hr><h2>Вызов term::getTerm("идентификатор") - получить значение термина</h2><div style="background-color:#eeeeee;">';
echo 'Значение термина "phone": '.$term1.'<br>';
echo 'Значение термина "adress": '.$term2.'</div><br>';
?>

<?

echo '<hr><h2>Зарезервированные переменные</h2>';
echo '<b>$PAGE</b> - Возвращает обработанную версию $_GET[\'page\']<br>';
echo '<b>$CAT</b> - Возвращает обработанную версию $_GET[\'cat\']<br>';
echo '<b>$LIST</b> - Возвращает обработанную версию $_GET[\'list\']<br>';
echo '<b>$ID</b> - Возвращает обработанную версию $_GET[\'id\']<br>';
echo '<b>$WAY</b> - путь до папки текущего скина<br>';
echo '<b>$WAY=</b>'.$WAY.'<br>';
?>

<?

echo '<hr><h2>Вызов form::getFormPage("идентификатор страницы") - позволяет получить идентификатор формы на данной странице</h2>';
echo 'Идентификатор формы на странице about: <b>'.form::getFormPage('about').'</b><br>';
echo '<h2>Вызов form::getForm("идентификатор формы") - позволяет получить даные формы</h2>';
echo '<h2>Вызов form::send("идентификатор формы",0,0) - позволяет отправить данные формы, причём возвращает результат отправки</h2>';
echo '<h2>Вызов form::formStart("идентификатор формы") - Открывает форму</h2>';
echo '<h2>Вызов form::getFormRows("идентификатор формы") - Возвращает все поля формы</h2>';
echo '<h2>Вызов form::formStop("идентификатор формы") - Закрывает форму</h2>';
$formname=form::getFormPage('about');
$form=form::getForm($formname);
echo '<div style="background-color:#eeeeee;"><h2>'.$form->data['topic'].'</h2>';
$sended=form::send($formname,0,0);
if ($sended) echo '<br><div class=main>'.$sended.'</div></br>';
else
{
	form::formStart($formname);
	$formdata=form::getFormRows($formname);
	echo '<div class=newform align=left><br><table cellpadding=0 cellspacing=0 border=0 width=600 style="padding-left:20px;">';
	foreach ($formdata as $element) 
		echo '<tr><td width=290 align=left valign=top>'.$element->data['content'].':</td><td width=20>&nbsp;</td>
			  <td width=290 align=left valign=top>'.$element->data['code'].'</td></tr><tr height=10></tr>';
	echo '</table></div><br><input name="'.$newform.'" type=submit value="'.$form->data['submit'].'">';
	form::formStop($formname);
}
echo '</div><br>';
?>

<?

echo '<hr><h2>Вызов news::getAllNews(int) - возвращает краткую версию int последних новостей</h2><div style="background-color:#eeeeee;">';
$news=news::getAllNews(3); 
foreach ($news as $element)
{
	echo '<div class=news_h>'.$element->data['topic'].'</div>
	<div class=news_c>'.$element->data['small'].'</div>';
	echo '<div class=news_i>'; if (($element->data['href']==1) || ($element->data['href']==2))
	echo '<a href='.$element->data['link'].'>Подробнее</a> &nbsp; ';
	echo $element->stat['createtime'].'</div>';
}
echo '</div><br>';

?>

<?

echo '<hr><h2>Вызов news::getNews("идентификатор") - возвращает новость</h2><div style="background-color:#eeeeee;">';
$news=news::getNews(2);
echo '<h3>'.$news->data['topic'].'</h3>
<div class=main>'.$news->data['big'].'<div align=left>
<b>'.$news->stat['createtime'].'</b>
</div></div>';
echo '</div><br>';

?>

<?

echo '<hr><h2>Вызов banner::getAllBanners() - возвращает все баннеры</h2><div style="background-color:#eeeeee;">';
$banner=banner::getAllBanners(); 
foreach ($banner as $element)
{
	echo '
		<div style="width:200px; overflow:hidden;">
		<a href='.$element->data['link'].' border=0 target=_blank>
		<img src='.$element->data['img'].' border=0 style="width:200px;"><br>
		'.$element->data['topic'].'
		</a>
		</div><br>';
}
echo '</div><br>';

?>

<?
echo '<hr><h2>Вызов staticpromo::getPromo() - возвращает статичный промо баннер</h2><div style="background-color:#eeeeee;">';

echo '<img src='.staticpromo::getPromo().' border=0 width=100>';

echo '</div><br>';
?>

</body>
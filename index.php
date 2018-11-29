<?php
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
*/

// Запуск сессии куков
session_start();

//Загрузка методов и классов Model
require_once('erdenimark_cms/model/Model.php');
//Загрузка методов и классов Facade
require_once('erdenimark_cms/facade/Facade.php');
//Загрузка методов и классов Controller
require_once('erdenimark_cms/controller/Controller.php');
//Загрузка методов и классов View
require_once('erdenimark_cms/view/View.php');

scr::loadPage();

?>

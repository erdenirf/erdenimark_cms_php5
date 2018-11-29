<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 23.02.2018
 * Website: www.sibserver.org
 */

/**
 * Классы Вид для представления.
 * Не используйте отсюда доступ напрямую к классу Модель!
 * Класс Вид должен обращаться к Фасаду или Контроллеру.
 * Классы вид должны быть со статическими методами, чтобы пользователю было удобно вызывать их из шаблонов.
 */

//Загрузка методов и классов SkinsConfig
require_once('SkinsConfig.php');
//Загрузка методов и классов scr
require_once('scr.php');
//Загрузка методов и классов form
require_once('form.php');
//Загрузка методов и классов banner
require_once('banner.php');
// Загрузка классов и методов Catalog
require_once('Catalog.php');
// Загрузка классов и методов user
require_once('user.php');
// Загрузка классов и методов Page
require_once('page.php');
// Загрузка классов и методов Menu
require_once('menu.php');
// Загрузка классов и методов slider
require_once('slider.php');
// Загрузка классов и методов term
require_once('term.php');
// Загрузка классов и методов promo
require_once('promo.php');



?>
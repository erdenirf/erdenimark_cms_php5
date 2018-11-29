<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 * Website: www.sibserver.org
 */

/**
 * Классы фасад - это слой абстракции между [Моделью] и [Контроллер-Вид]
 * Классы-фасадов должны минимизировать количество входных параметров, в идеале - функции без входных параметров
 * Класс фасад должен хранить преднастроенные Константы, чтобы в динамическом коде Контроллера и Вида они не мешались.
 * Класс-фасад в большинстве случаев имеет статические методы.
 */

// Загрузка классов и методов Headers
require_once('Headers.php');
// Загрузка классов и методов abstract_part_page
require_once('abstract_part_page.php');
// Загрузка классов и методов part_page
require_once('part_page.php');
// Загрузка классов и методов pages_iterator
require_once('pages_iterator.php');
// Загрузка классов и методов part_form
require_once('part_form.php');

?>
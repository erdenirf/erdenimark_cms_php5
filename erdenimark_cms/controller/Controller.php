<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 22.02.2018
 * Website: www.sibserver.org
 */

/**
 * Класс Контроллер служит для передачи данных GET, POST в класс Фасад
 * Не используйте отсюда доступ напрямую к классу Модель!
 * Класс-контроллер должен обращаться к Фасаду.
 * Класс-контроллер и класс-вид работают с конечным Пользователем (client).
 * Класс-контроллер не статический.
 */

// Класс для конфигурации для админ-панели
require_once ("AdminConfig.php");
// Класс для авторизации в админ-панель
require_once ("AdminAuthorization.php");

?>
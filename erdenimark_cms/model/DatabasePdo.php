<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 13.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * Класс DatabasePdo - паттерн Singleton. 
 * Общение с базой данных из одной точки.
 * Не трогать здесь код!
 */
class DatabasePdo extends DatabaseConfig {

    //приватные переменные
    private static $instance;
    private function  __construct() { /* Singleton privates constructor */ }

    /**
     * [getInstance Singleton description]
     * @return [class PDO] [description]
     */
    public static function getInstance() {

        if (!isset(self::$instance)) {

            try {
                $dsn = "mysql:host=".parent::getHost().";dbname=".parent::getNameDatabase().";charset=".parent::getCharset();
                $user = parent::getUsername();
                $pass = parent::getPassword();
                $opt = parent::getOpt();
                self::$instance = new \PDO($dsn, $user, $pass, $opt);
            }
            catch (\PDOException $pe) {
                echo die("Error connection to Database! Bad host, database, username, password or charset. Error occured: " . $pe->getMessage());
            }
            
        }
        return self::$instance;
    }

    /**
     * [__clone description]
     * @return [type] [description]
     */
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    /**
     * [__wakeup description]
     */
    public function __wakeup()
    {
        trigger_error('Unserialing is not allowed.', E_USER_ERROR);
    }
}

?>
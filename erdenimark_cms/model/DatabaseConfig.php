<?
/**
 * Author: Erdeni Tsyrendashiyev
 * Date: 13.02.2018
 * Website: www.sibserver.org
 */

namespace ErdeniMark\Model;

/**
 * Класс настроек для базы данных.
 */
class DatabaseConfig {
    /*
     * Конфигурационные данные БД
     */
    private static $host = 'localhost';

    private static $nameDatabase = '00074812_veselogulyat';

    private static $username = '00074812_veselog';

    private static $password = 'OgDCjd9v';

    private static $charset = 'utf8';

    private static $opt = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    /**
     * [getHost description]
     * @return [type] [description]
     */
    protected static function getHost() {
        return self::$host;
    }

    /**
     * [getUsername description]
     * @return [type] [description]
     */
    protected static function getUsername()
    {
        return self::$username;
    }

    /**
     * [getPassword description]
     * @return [type] [description]
     */
    protected static function getPassword()
    {
        return self::$password;
    }

    /**
     * [getNameDatabase description]
     * @return [type] [description]
     */
    protected static function getNameDatabase()
    {
        return self::$nameDatabase;
    }

    /**
     * [getCharset description]
     * @return [type] [description]
     */
    protected static function getCharset()
    {
    	return self::$charset;
    }

    /**
     * [getOpt description]
     * @return [type] [description]
     */
    protected static function getOpt() {
    	return self::$opt;
    }

}

?>
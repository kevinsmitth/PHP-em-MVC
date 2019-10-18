<?php
date_default_timezone_set('America/Sao_Paulo');

abstract class Connection
{
    private static $conn;
    public static function getConn()
    {
        if (self::$conn == null) {
            self::$conn = new PDO('mysql:host=sql313.epizy.com; dbname=epiz_24404513_portfolio; charset=utf8', 'epiz_24404513', '98758816');
        }
        date_default_timezone_set('America/Sao_Paulo');
        return self::$conn;
    }
}

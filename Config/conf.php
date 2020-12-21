<?php 
class Conf {
    static private $database = array('hostname' => "localhost"
                                     ,'database' => "projet"
                                     ,'login' => "root"
                                     ,'password' => "");
    static public function getLogin() {
        return Conf::$database["login"];
    }
    static public function getPass() {
        return Conf::$database["password"];
    }
    static public function getHost() {
        return Conf::$database["hostname"];
    }
    static public function getBase() {
        return Conf::$database["database"];
    }
} 
?>
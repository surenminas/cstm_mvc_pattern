<?php

namespace fw\core;

class Db {

    use Tsingleton;
    
    // protected $db;
    
    protected static $instance;
    // public static $countSql = 0;
    // public static $queries = [];

    protected function __construct() {
        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';
        \R::setup( $db['dsn'], $db['user'], $db['password']);
        \R::freeze( TRUE );
    }


    

    // public static function instance() {
    //     if(self::$instance === null) {
    //         self::$instance = new self;
    //     }
    //     return self::$instance;
    // }
    
    
    // public function execute($sql, $params = []) {
    //     self::$countSql++;
    //     self::$queries[] = $sql;
    //     $stmt = $this->db->prepare($sql);
    //     return $stmt->execute($params);
    // }

    // public function query($sql, $params = []) {
    //     self::$countSql++;
    //     self::$queries[] = $sql;
    //     $stmt = $this->db->prepare($sql);
    //     var_dump($stmt);
    //     $res = $stmt->execute($params);
    //     if($res !== false) {
    //         return $stmt->fetchAll();
    //     }
    //     return [];
    // }

}
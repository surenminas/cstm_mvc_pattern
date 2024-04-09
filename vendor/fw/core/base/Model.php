<?php

namespace fw\core\base; 

use fw\core\Db;
use Valitron\Validator;

abstract class Model {

    protected $pdo;
    protected $table;
    protected $defaultField = 'id';
    public $attributs = [];
    public $errors = [];
    public $rules = [];

    public function __construct() {
        $this->pdo = Db::instance();
    }

    public function load($data) {
        foreach($this->attributs as $name => $value) {
            if(isset($data[$name])) {
                $this->attributs[$name] = $data[$name];
            }
        }
    }

    public function validate($data) {
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()) {
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function save($table) {
        $tbl = \R::dispense($table);
        foreach($this->attributs as $name => $value) {
            $tbl->$name = $value;
        }
        return \R::store($tbl);
    }

    public function getErrors() {
        $errors = '<ul>';
            foreach($this->errors as $error) {
                foreach($error as $item) {
                    $errors .= "<li>$item</li>";
                }
            }
        $errors.= '</ul>';
        $_SESSION['error'] = $errors;
    }





    // public function query($sql) {
    //     return $this->pdo->execute($sql);
    // }

    // public function findAll() {
    //     $sql = "SELECT * FROM {$this->table}";
    //     return $this->pdo->query($sql);
    // }

    // public function findOne($id, $field = '') {
    //     $field = $field ?: $this->defaultField;
    //     $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
    //     return $this->pdo->query($sql, [$id]);
    // }

    // public function findBySql($sql, $params = []) {
    //     return $this->pdo->query($sql, $params);
    // }

    // public function findeLike($str, $field, $table = []) {
    //     $table = $table ?: $this->table;
    //     $sql = "SELECT * FROM $table WHERE $field LIKE ?";
    //     var_dump($sql);
    //     return $this->pdo->query($sql, ['%' . $str . '%']);
    // }

 }
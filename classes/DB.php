<?php

/**
 * Description of DB
 *
 * @author mzolee
 */
class DB {
    
    private $conn;
    public $error;
    public $errNum;
    
    function __construct() {
    }

    private function initDB() {
        $this->conn = mysqli_connect(DBconf::$host, DBconf::$username, DBconf::$password, DBconf::$db, DBconf::$port);
        return $this;
    }
    
    public function query($sql) {
        $this->initDB();
        $result = $this->conn->query($sql);
        if (!$result) {
            $this->error = "query failed: " . $this->conn->error;
            $this->errNum = $this->conn->errno;
            return false;
        }
        if(is_bool($result)) {
            $ret = $result;
        } else {
            $ret = [];
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $ret[] = $row;
            }
            $result->close();
        }
        $this->conn->close();
        return $ret;
    }
    
    public function esc($param) {
        $this->initDB();
        $ret = $this->conn->real_escape_string($param);
        $this->conn->close();
        return $ret;
    }
    
    public static function genInsertQuery($table, $data) {
        foreach ($data as $k=>$v) {
            $columns[] = $k;
            $values[] = "'$v'";
        }
        return "INSERT INTO $table (" . implode(",",$columns) . ") VALUES (" . implode(",",$values) . ")";
    }
    
    public static function genUpdateQuery($table, $data, $where) {
        foreach ($data as $k=>$v) {
            $setters[] = "$k='$v'";
        }
        return "UPDATE $table SET " . implode(",",$setters) . " WHERE $where";
    }
    
    
}

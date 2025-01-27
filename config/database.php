<?php
namespace Config;

use PDO;
use PDOException;
require_once ROOT . '/app/helpers/readEnv.php';
use function App\Helpers\readEnv;


class Database
{
    private static $_instance;
    private $_db, $_query, $_count, $_lastInsertID, $_results;
    private $_error;

    private function __construct()
    {
        try {
            $this->_db = new PDO("mysql:host=" . readEnv('DB_HOST') . ";dbname=" . readEnv('DB_NAME') . "", readEnv('DB_USER'), '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    public function read($table = null, $sql = "")
    {
        if ($table != null) {
            $sql = "SELECT * FROM $table";
        }
        if ($this->_query = $this->_db->prepare($sql)) {
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll();
                $this->_count = $this->_query->rowCount();
            } else {
                die("somethings went wrong");
            }
        }
        return $this;
    }

    public function check($table, $keyVal)
    {
        $sql = "SELECT * FROM $table WHERE ";
        $conditions = [];

        if (is_array($keyVal)) {
            foreach ($keyVal as $key => $value) {
                // Use prepared statements or escape the values to prevent SQL injection
                $conditions[] = "$key = '$value'";
            }
            $sql .= implode(" AND ", $conditions);
        }

        $this->_query = $this->_db->prepare($sql);

        if ($this->_query->execute()) {
            $this->_results = $this->_query->fetch();
            $this->_count = $this->_query->rowCount();
            return $this->_results;
        }
        return false;
    }

    private function insert($sql, $params = null)
    {
        //print_r($params);die();
        //die($sql);
        $this->_error = false;
        if ($this->_query = $this->_db->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->_query->execute()) {
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_db->lastInsertId();
                return true;
            } else {
                return false;
            }
        }
    }

    public function delete($table, $param)
    {
        $sql = "DELETE FROM $table WHERE productId=$param";
        $this->_query = $this->_db->prepare($sql);
        $this->_query->execute();
        return $this;
    }

    public function update($table, $params)
    {

    }

    public function store($table, $keyValue)
    {
        $keyString = "";
        $fieldString = "";
        $values = [];

        foreach ($keyValue as $key => $value) {
            $value = htmlspecialchars($value);
            $keyString .= '`' . $key . '`,';
            $fieldString .= '?,';
            $values[] = $value;
        }
        $keyString = rtrim($keyString, ',');
        $fieldString = rtrim($fieldString, ',');


        $sql = "INSERT INTO `$table` ($keyString) VALUES ($fieldString)";

        //die($sql);
        if ($this->insert($sql, $values)) {
            return true;
        }
        return false;
    }

    public function specialQuery($params, $tables, $conditions = [], $limit = null)
    {
        $sql = "";
        $sql .= 'SELECT ';
        if (is_array($params)) {
            foreach ($params as $param) {
                $sql .= $param . ',';
            }
            $sql = rtrim($sql, ',');
        } else {
            $sql .= $params;
        }
        $sql .= " FROM ";
        if (is_array($tables)) {
            foreach ($tables as $table) {
                $sql .= $table . ' JOIN ';
            }
            $sql = rtrim($sql, ' JOIN ');
        } else {
            $sql .= $tables . ' ';
        }

        if (isset($conditions)) {
            $sql .= " WHERE ";
            for ($i = 0; $i < sizeof($conditions); $i++) {
                $sql .= " $conditions[$i] AND ";
            }
            $sql = rtrim($sql, ' AND ');
            // if (count($conditions)==1) {
            //   $sql .= " WHERE $conditions[0]";
            // } else {
            //   $sql .= " WHERE $conditions[0] AND $conditions[1]";
            // }
        }
        if ($limit != null) {
            $sql .= " LIMIT $limit";
        }
        //die($sql);
        return $this->read(null, $sql)->results();
    }

    public function results()
    {
        return $this->_results;
    }

    public function getCount()
    {
        return $this->_count;
    }

}
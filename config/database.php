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

    public function filter($table, $conditions = [])
    {
        try {
            // Database connection (Update credentials as needed)
            $pdo = $this->_db;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Base Query
            $sql = "SELECT * FROM $table";

            // If conditions exist, append WHERE clause
            if (!empty($conditions)) {
                $sql .= " WHERE ";
                $sql .= implode(" AND ", array_map(fn($key) => "$key = :$key", array_keys($conditions)));
            }

            $stmt = $pdo->prepare($sql);

            // Execute query with conditions
            $stmt->execute($conditions);

            // Fetch and return results
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }


    public function seed($table, $post)
    {
        try {
            $columns = implode(", ", array_keys($post));
            $placeholders = ":" . implode(", :", array_keys($post));

            $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
            $stmt = $this->_db->prepare($sql);
            foreach ($post as $key => $value) {
                $stmt->bindValue(":" . $key, $value);
            }
            return $stmt->execute($post);
        } catch (PDOException $e) {
            $duplicate = [];

            // Handle duplicate constraint violations
            if ($e->getCode() == 23000) {
                if (strpos($e->getMessage(), 'phone') !== false) {
                    $duplicate['phone'] = "{$post['phone']} number is already used.";
                }
                if (strpos($e->getMessage(), 'email') !== false) {
                    $duplicate['email'] = "{$post['email']} email is already registered.";
                }
            }
            // Return duplicate field errors if found
            if (!empty($duplicate)) {
                return $duplicate;
            }
            return "Database error: " . $e->getMessage();
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
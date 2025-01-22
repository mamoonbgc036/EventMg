<?php
// core/Model.php

class Model
{
    protected $db;

    public function __construct()
    {
        // Initialize the database connection
        $this->db = (new Database())->getConnection();
    }

    /**
     * Execute a query and return the result set.
     *
     * @param string $sql The SQL query to execute.
     * @param array $params Optional parameters for prepared statements.
     * @return array The result set as an associative array.
     */
    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Execute a query and return a single row.
     *
     * @param string $sql The SQL query to execute.
     * @param array $params Optional parameters for prepared statements.
     * @return array|null A single row as an associative array, or null if no rows are found.
     */
    public function fetch($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Execute a query (e.g., INSERT, UPDATE, DELETE).
     *
     * @param string $sql The SQL query to execute.
     * @param array $params Optional parameters for prepared statements.
     * @return bool True if the query was successful, false otherwise.
     */
    public function execute($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Get the last inserted ID.
     *
     * @return string The last inserted row ID.
     */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}
?>
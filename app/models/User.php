<?php
// app/models/User.php

class User extends Model
{
    public function getUsers()
    {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }
}
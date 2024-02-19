<?php
require_once(__DIR__ . '/Db.php');

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function createUser($pseudo, $email)
    {
        $sql = 'INSERT INTO users (pseudo, email) VALUES (:pseudo, :email)';
        $this->db->query($sql);
        $this->db->bind(':pseudo', $pseudo);
        $this->db->bind(':email', $email);
        $this->db->execute();

        return $this->db->lastInsertId();
    }
}

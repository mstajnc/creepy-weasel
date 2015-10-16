<?php

namespace Model;

use PDO;
use PDOException;

class GuestbookModel {
    protected $connection;
    public $posts;
    
    public function __construct() {
        try {
            $this->connection = new PDO(getenv('DB_DSN'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function save($username, $content)
    {
        $sql = "INSERT INTO `guestbook` SET `username` = :username, `content` = :content";

        $query = $this->connection->prepare($sql);
        $query->execute(['username' => $username, 'content' => $content]);
    }

    public function getPosts()
    {
        $sql = "SELECT `username`, `content` FROM `guestbook` ORDER BY `id` DESC";

        $posts = [];

        foreach ($this->connection->query($sql) as $row) {
            $posts[] = ['username' => $row['username'], 'content' => $row['content']];
        }

        return $posts;
    }
}
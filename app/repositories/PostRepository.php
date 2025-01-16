<?php

namespace App\Repositories;

use PDO;
use App\Models\Post;

class PostRepository
{
    private $db;

    public function __construct()
    {
        include __DIR__ . '/../config/dbconfig.php';
        $this->db = new PDO("$type:host=$servername;dbname=$dbname", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll()
    {
        $query = 'SELECT * FROM posts WHERE is_deleted = 0';
        $stmt = $this->db->query($query);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($results as $row) {
            $posts[] = new Post(
                $row['id'],
                $row['title'],
                $row['content'],
                $row['date_posted'],
                $row['upvote_count'],
                $row['downvote_count'],
                $row['author_id'],
                $row['is_deleted']
            );
        }
        return $posts;
    }

    public function getById($id)
    {
        $query = 'SELECT * FROM posts WHERE id = :id AND is_deleted = 0';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Post(
                $result['id'],
                $result['title'],
                $result['content'],
                $result['date_posted'],
                $result['upvote_count'],
                $result['downvote_count'],
                $result['author_id'],
                $result['is_deleted']
            );
        }
    }
}

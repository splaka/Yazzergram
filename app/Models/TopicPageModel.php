<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicPageModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $allowedFields = ['testo', 'id_user', 'id_topic'];

    public function getTopicPosts($id_topic)
    {
        return $this->select('post.testo, utenti.username')
            ->join('utenti', 'post.id_user = utenti.id_user')
            ->where('post.id_topic', $id_topic)
            ->orderBy('post.id_post', 'DESC')
            ->findAll();
    }
}

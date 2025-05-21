<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicPageModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $allowedFields = ['testo', 'data_ora', 'id_user', 'id_topic'];

    public function getTopicPosts($id_topic, $perPage = 10)
    {
        return $this->select('post.testo, utenti.username, post.data_ora')
            ->join('utenti', 'post.id_user = utenti.id_user')
            ->where('post.id_topic', $id_topic)
            ->orderBy('post.data_ora', 'DESC')
            ->paginate($perPage);
    }
}

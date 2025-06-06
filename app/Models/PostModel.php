<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'id_post';
    protected $allowedFields = ['testo', 'data_ora', 'id_user', 'id_topic'];

    public function getTopicPosts($id_topic, $perPage = 10)
    {
        return $this->select('post.testo, utenti.username, post.data_ora, post.id_post')
            ->join('utenti', 'post.id_user = utenti.id_user')
            ->where('post.id_topic', $id_topic)
            ->orderby('post.id_post', 'ASC')
            //Magica funzione di CodeIgniter per la paginazione
            ->paginate($perPage);
    }

    public function newPost($id_topic, $testo)
    {
        return $this->insert([
            'testo' => $testo,
            'data_ora' => date('Y-m-d H:i:s'),
            'id_user' => session()->get('user_id'),
            'id_topic' => $id_topic
        ]);
    }
}

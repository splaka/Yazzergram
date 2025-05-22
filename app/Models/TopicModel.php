<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topic';
    protected $primaryKey = 'id_topic';
    protected $allowedFields = ['titolo', 'id_user'];

    public function getTopics($perPage = 10)
    {
        return $this->select('topic.id_topic, topic.titolo, utenti.username')
            ->join('utenti', 'topic.id_user = utenti.id_user')
            ->paginate($perPage);
    }

    public function getUserTopic($id_topic)
    {
        return $this->select('topic.id_topic, topic.titolo, utenti.username')
            ->join('utenti', 'topic.id_user = utenti.id_user')
            ->where('topic.id_topic', $id_topic)
            ->first();
    }

    public function newTopic($titolo)
    {
        return $this->insert([
            'titolo' => $titolo,
            'id_user' => session()->get('user_id')
        ]);
    }
}

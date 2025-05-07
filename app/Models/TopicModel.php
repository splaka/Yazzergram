<?php

namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topic';
    protected $primaryKey = 'id_topic';
    protected $allowedFields = ['titolo', 'id_user'];

    public function getTopics()
    {
        $this->select('topic.id_topic, topic.titolo, utenti.username')
            ->join('utenti', 'topic.id_user = utenti.id_user')
            ->orderBy('topic.id_topic', 'DESC');
        return $this->findAll();
    }

    public function getUserTopic($id_topic)
    {
        $this->select('topic.id_topic, topic.titolo, utenti.username')
            ->join('utenti', 'topic.id_user = utenti.id_user')
            ->where('topic.id_topic', $id_topic);
        return $this->first();
    }
}

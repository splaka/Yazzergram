<?php

namespace App\Controllers;

use App\Models\TopicModel;
use App\Models\TopicPageModel;

class TopicPage extends BaseController
{
    public function index($id): string
    {
        $topicModel = new TopicModel();
        $postModel = new TopicPageModel();

        // Fetch the topic details
        $topic = $topicModel->getUserTopic($id);

        if (!$topic) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("NEGOR");
        }

        // Fetch the posts for the topic
        $posts = $postModel->getTopicPosts($id);

        // Pass data to the view
        return view('topicPage', [
            'topic' => $topic,
            'posts' => $posts
        ]);
    }
}

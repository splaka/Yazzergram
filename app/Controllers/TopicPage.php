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

        // Fetch dei dettagli del topic (titolo e autore)
        $topic = $topicModel->getUserTopic($id);

        if (!$topic) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Il topic non esiste.");
        }

        // Fetch dei post associati al topic
        $posts = $postModel->getTopicPosts($id);

        return view('topicPage', [
            'topic' => $topic,
            'posts' => $posts,
            'pager' => $postModel->pager
        ]);
    }

    public function newPost($id)
    {
        $postModel = new TopicPageModel();

        // Validazione del testo del post
        $validation = \Config\Services::validation();
        $validation->setRules([
            'testo' => 'required|min_length[5]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Creazione del nuovo post
        $postModel->newPost($id, $this->request->getPost('testo'));

        return redirect()->to('/topic/' . $id)->with('success', 'Post creato con successo.');
    }
}

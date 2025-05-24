<?php

namespace App\Controllers;

use App\Models\TopicModel;
use App\Models\PostModel;

class TopicPage extends BaseController
{
    public function index($id): string
    {
        $topicModel = new TopicModel();
        $postModel = new PostModel();

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
        $postModel = new PostModel();

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

    public function deletePost($id_post)
    {
        $postModel = new PostModel();

        // Verifica se il post esiste
        if (!$postModel->find($id_post)) {
            return redirect()->back()->with('error', 'Il post non esiste.');
        }

        // Elimina il post
        $postModel->delete($id_post);

        return redirect()->back()->with('success', 'Post eliminato con successo.');
    }
}

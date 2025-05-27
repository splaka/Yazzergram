<?php

namespace App\Controllers;

use App\Models\TopicModel;

class Home extends BaseController
{
    public function index(): string
    {
        //Autoesplicativo direi
        $model = new TopicModel();
        $data['topics'] = $model->getTopics();

        return view('index', [
            'topics' => $data['topics'],
            'pager'  => $model->pager
        ]);
    }

    //Forse serviva un controller Topic, ma non mi andava di fare un altro file
    public function newTopic()
    {
        $model = new TopicModel();

        // Validazione del titolo del topic
        $validation = \Config\Services::validation();
        $validation->setRules([
            'titolo' => 'required|min_length[5]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Creazione del nuovo topic
        $model->newTopic($this->request->getPost('titolo'));

        return redirect()->to('/')->with('success', 'Topic creato con successo.');
    }

    public function deleteTopic(int $id)
    {
        $model = new TopicModel();
        $model->deleteTopic($id);

        return redirect()->to('/')->with('success', 'Topic eliminato con successo.');
    }

    public function newTopicForm()
    {
        return view('creaTopic');
    }
}

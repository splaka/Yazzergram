<?php

namespace App\Controllers;
use App\Models\TopicModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new TopicModel();
        $data['topics'] = $model->getTopics();

        return view('index', $data);
    }
}

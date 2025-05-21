<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function signupForm()
    {
        // Carica la pagina di registrazione
        return view('signup');
    }

    public function loginForm()
    {
        // Carica la pagina di login
        return view('login');
    }

    public function login()
    {
        $validation = \Config\Services::validation();

        // Validazione Input Form
        $validation->setRules([
            'email'    => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Torna al form di login con i campi con errori
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Imposta la sessione utente
            $session = session();
            $session->set([
                'user_id'  => $user['id_user'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'logged_in'=> true,
            ]);
            // Redirect alla home
            return redirect()->to('/')->with('success', 'Accesso effettuato con successo.');
        }
        else {
            // Se l'email o la password non sono corrette
            return redirect()->back()->withInput()->with('errors', ['email' => 'Email o password errati.']);
        }
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        // Validazione Input Form
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[utenti.username]',
            'email'    => 'required|valid_email|is_unique[utenti.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Torna al form di registrazione con i campi con errori
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Salva i dati dell'utente nel database
        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        // Redirect alla pagina di login con un messaggio di successo
        return redirect()->to('/')->with('success', 'Account creato con successo, accedi.');
    }

    public function logout()
    {
        // Distruggi la sessione
        $session = session();
        $session->destroy();

        // Redirect alla home
        return redirect()->to('/');
    }
}
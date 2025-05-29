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
        //Fetch utente dal database
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
            'password_confirm' => [
                //Label perchè il nome del campo non è carino da vedere
                'label' => 'conferma password',
                'rules' => 'required|matches[password]'
            ],
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

    public function profile()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        return view('profiloUtente', [
            'user' => $user,
        ]);
    }

    public function deleteAccount()
    {
        $userModel = new UserModel();
        $session = session();

        // Elimina l'account
        $userModel->delete($session->get('user_id'));
        $session->destroy();

        return redirect()->to('/')->with('success', 'Account eliminato con successo.');
    }
    
    public function updateProfileForm()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        return view('newCredenziali', [
            'user' => $user,
        ]);
    }

    public function updateProfile()
    {
        $userModel = new UserModel();
        $session = session();
        $userId = $session->get('user_id');

        $validation = \Config\Services::validation();
        $rules = [
            //Controllo per fare in modo che l'username e l'email siano univoci, escludendo l'utente corrente
            'username' => 'required|min_length[3]|is_unique[utenti.username,id_user,' . $userId . ']',
            'email' => 'required|valid_email|is_unique[utenti.email,id_user,' . $userId . ']',
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $rules['password'] = 'min_length[6]';
            $rules['password_confirm'] = [
                //Label perchè il nome del campo non è carino da vedere
                'label' => 'conferma password',
                'rules' => 'required|matches[password]'
            ];
        }

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $updateData = [
            // Preparo i dati da aggiornare
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($userId, $updateData);

        $session->set([
            // Aggiorno i dati della sessione, molto molto importante
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ]);

        return redirect()->to('/profilo')->with('success', 'Profilo aggiornato con successo.');
    }
}
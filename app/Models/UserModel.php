<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'utenti';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'email', 'password'];

    public function getUser($id_user)
    {
        return $this->where('id_user', $id_user)->first();
    }
}
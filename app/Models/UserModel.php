<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'utenti';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'email', 'password'];
}
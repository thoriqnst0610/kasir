<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model{

    protected $table = 'admin';
    protected $primaryKey = 'idAdmin';

    protected $allowedFields = ['idAdmin', 'nama', 'email', 'password'];
    
}
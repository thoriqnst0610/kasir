<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model{

    protected $table      = 'session'; // Nama tabel
    protected $primaryKey = 'idSession';    // Primary key

    protected $allowedFields = ['idSession', 'jwt', 'email']; // Kolom yang boleh diisi

}
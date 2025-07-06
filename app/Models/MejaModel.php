<?php

namespace App\Models;

use CodeIgniter\Model;

class MejaModel extends Model{

    protected $table      = 'meja'; // Nama tabel
    protected $primaryKey = 'idMeja';    // Primary key

    protected $allowedFields = ['idMeja', 'noMeja']; // Kolom yang boleh diisi

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model{

    protected $table      = 'menu'; // Nama tabel
    protected $primaryKey = 'idMenu';    // Primary key

    protected $allowedFields = ['idMenu', 'namaMenu', 'hargaMenu', 'kategoriMenu', 'gambarMenu']; // Kolom yang boleh diisi

}
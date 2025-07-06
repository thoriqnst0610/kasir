<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{

    protected $table      = 'transaksiSementara'; // Nama tabel
    protected $primaryKey = 'idTransaksi';    // Primary key

    protected $allowedFields = ['idTransaksi', 'namaMenu', 'hargaMenu', 'jumlah']; // Kolom yang boleh diisi

}
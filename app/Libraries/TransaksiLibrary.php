<?php

namespace App\Libraries;

use App\Models\TransaksiModel;
use Exception;

class TransaksiLibrary
{

    public function show()
    {

        $transaksiModel = new TransaksiModel();
        return $transaksiModel->findAll();
    }

    public function save(string $namaMenu, string $hargaMenu, string $jumlah)
    {

        $transaksiModel = new TransaksiModel();

        try {

            if (empty($namaMenu) || empty($hargaMenu) || empty($jumlah)) {

                throw new Exception('nama menu, harga dan jumlah tidak boleh kosong');
            } else {

                $tanggal = date('YmdHis');
                $randomNumber = rand(1000, 9999);
                $idTransaksi = 'Transaksi' . $tanggal . $randomNumber;

                $data = [
                    'idTransaksi' => $idTransaksi,
                    'namaMenu' => $namaMenu,
                    'hargaMenu' => $hargaMenu,
                    'jumlah' => $jumlah
                ];

                $transaksiModel->insert($data);
                return true;
            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function delete() {}

    public function deleteAll() {

        // $transaksiModel = new TransaksiModel();
        // $transaksiModel->delete();

        $db = \Config\Database::connect();
        $db->table('transaksiSementara')->truncate();
        return true;

    }
}

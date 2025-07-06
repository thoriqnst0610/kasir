<?php

namespace App\Controllers;

use App\Libraries\MejaLibrary;
use App\Libraries\MenuLibrary;
use App\Libraries\TransaksiLibrary;

class TransaksiController extends BaseController{

    public function menampilkanData(){

        $menuLibrary = new MenuLibrary();
        $data = $menuLibrary->show();

        return view('Admin/header', ['data' => $data]).view('Admin/transaksi').view('Admin/footer');

    }

    public function menampilkanTransaksi(){

        $transaksiLibrary = new TransaksiLibrary();
        $mejaLibrary = new MejaLibrary();
        $data = $transaksiLibrary->show();
        $meja = $mejaLibrary->show();

        return view('Admin/header', ['data' => $data, 'meja' => $meja]).view('Admin/pesanan').view('Admin/footer');

    }

    public function menambahTransaksi(){

        $transaksiLibrary = new TransaksiLibrary();

        $namaMenu = filter_var($this->request->getPost('namaMenu'), FILTER_SANITIZE_SPECIAL_CHARS);
        $hargaMenu = $this->request->getPost('hargaMenu');
        $jumlah = $this->request->getPost('jumlah');

        if($transaksiLibrary->save($namaMenu, $hargaMenu, $jumlah)){

            return redirect()->to('/pesanan')->with('success', 'pesanan ditambah');

        }else{

            return redirect()->back()->with('error', 'gagal menambah pesanan');

        }
    }

    public function cetakPesanan(){

        $transaksiLibrary = new TransaksiLibrary();

        $data = $transaksiLibrary->show();
        $nomorMeja = $this->request->getPost('nomorMeja');
        $total = $this->request->getPost('total');

        $pesanan = [
            'nomorMeja' => $nomorMeja,
            'total' => $total
        ];

        return view('Admin/cetakPesanan', ['data' => $data, 'pesanan' => $pesanan]);

    }


    public function menghapusSemuaTransaksi(){

        $transaksiLibrary = new TransaksiLibrary();
        $transaksiLibrary->deleteAll();

        return $this->menampilkanData();

    }
}
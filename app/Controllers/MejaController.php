<?php

namespace App\Controllers;

use App\Libraries\MejaLibrary;

class MejaController extends BaseController{

    public function menampilkanData(){

        $mejaLibrary = new MejaLibrary();
        $data = $mejaLibrary->show();

        return view('Admin/header', ['data' => $data]).view('Admin/meja').view('Admin/footer');
        
    }

    public function menyimpanData(){

        $mejaLibrary = new MejaLibrary();
        $noMeja = filter_var($this->request->getPost('nomorMeja'), FILTER_SANITIZE_SPECIAL_CHARS);

        if($mejaLibrary->save($noMeja)){

            return redirect()->to('/meja')->with('success', 'Data Ditambah');

        }else{

            return redirect()->back()->with('error', 'Gagal Menambah Data');

        }

    }

    public function mengeditData(){

        $mejaLibrary = new MejaLibrary();
        $noMeja = filter_var($this->request->getPost('nomorMeja'), FILTER_SANITIZE_SPECIAL_CHARS);
        $idMeja = filter_var($this->request->getPost('idMeja'), FILTER_SANITIZE_SPECIAL_CHARS);

        if($mejaLibrary->update($idMeja, $noMeja)){

            return redirect()->to('/meja')->with('success', 'Data Diubah');

        }else{

            return redirect()->back()->with('error', 'Gagal Mengubah Data');

        }

    }

    public function menghapusData(){

        $mejaLibrary = new MejaLibrary();
        $idMeja = filter_var($this->request->getPost('idMeja'), FILTER_SANITIZE_SPECIAL_CHARS);

        if($mejaLibrary->delete($idMeja)){

            return redirect()->to('/meja')->with('success', 'Data dihapusa');
            
        }else{

            return redirect()->back()->with('error', 'Gagal Menghapus Data');

        }
    }
}
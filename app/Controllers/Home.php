<?php

namespace App\Controllers;

use App\Libraries\AdminLibrary;
use App\Libraries\SessionLibrary;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function loginPost()
    {

        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $password = $this->request->getPost('password');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return redirect()->back()->with('error', 'format email tifak vaid');
        }

        $adminService = new AdminLibrary();
        $validasiLogin = $adminService->loginAdmin($email, $password);

        if ($validasiLogin) {

            return redirect()->to('/transaksi')->with('success', 'Sukses Login');
        } else {

            return redirect()->back()->with('error', 'username atau password salah');
        }
    }

    public function dashboard(){

        return view('Admin/header').view('Admin/dashboard').view('Admin/footer');

    }

    public function logout(){

        $adminService = new AdminLibrary();
        $adminService->logout();
        return redirect()->to('/')->with('success', 'anda sudah logout');
    }

    public function registerPost()
    {

        $adminSerivce = new AdminLibrary();

        $nama = filter_var($this->request->getPost('nama'), FILTER_SANITIZE_EMAIL);
        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $password = filter_var($this->request->getPost('password'), FILTER_SANITIZE_EMAIL);
        if ($adminSerivce->cekEmail($email) == false) {

            return redirect()->back()->with('error', 'email sudah terdaftar');
        }

        $simpanData = $adminSerivce->tambahAdmin($nama, $email, $password);

        if ($simpanData) {

            return redirect()->to('/akun')->with('success', 'berhasil register');
        } else {

            return redirect()->back()->with('error', 'gagal register');
        }
    }

    public function editAkun()
    {

        $idAdmin = filter_var($this->request->getPost('idAdmin'), FILTER_SANITIZE_SPECIAL_CHARS);
        $nama = filter_var($this->request->getPost('nama'), FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $password = filter_var($this->request->getPost('password'), FILTER_SANITIZE_SPECIAL_CHARS);
        

        $adminLibrary = new AdminLibrary();
        $editAdmin = $adminLibrary->editAkun($idAdmin, $nama, $email, $password);

        if ($editAdmin == true) {

            return redirect()->to('/akun')->with('success', 'akun berhasil perbaharui');
        } else {

            return redirect()->back()->with('error', 'akun gagal diperbaharui');
        }
    }

    public function ambilAkun()
    {

        $adminLibrary = new AdminLibrary();

        $sessionLibrary = new SessionLibrary();
        $ambilEmail = filter_var($sessionLibrary->cekToken(), FILTER_SANITIZE_SPECIAL_CHARS) ;

        if ($ambilEmail !== false) {

            $data = $adminLibrary->ambilAdmin($ambilEmail);

            return view('Admin/header', ['data' => $data]) . view('Admin/akun') . view('Admin/footer');

        }else{

        }
    }
}

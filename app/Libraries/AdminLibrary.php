<?php

namespace App\Libraries;

use App\Models\AdminModel;
use Exception;

class AdminLibrary{

    public function loginAdmin(string $email, string $password){

        $adminModel = new AdminModel();

        if(empty($email) || empty($password)){

            return false;

        }else{

            $cekEmail = $adminModel->where('email', $email)->first();

            if($cekEmail == null){

                return false;

            }else{

                $cekPassword = password_verify($password, $cekEmail['password']);

                if($cekEmail !== null AND $cekPassword == true){

                    $sessionLibrary = new SessionLibrary();

                    if($sessionLibrary->cekCookie() !== false){

                        return true;

                    }else{

                        $kodeSession = $sessionLibrary->buatToken($cekEmail['email']);

                        if($kodeSession !== false){

                            return true;

                        }else{

                            return false;

                        }
                    }
                }else{

                    return false;
                    
                }

            }

            
        }
    }

    public function logout(){

        try{

            $sessionLibrary = new SessionLibrary();
            $ambilCookie = $sessionLibrary->cekCookie();

            if(is_string($ambilCookie)){

                $sessionLibrary->hapusCookie();

            }else{

                throw new Exception('error Gagal logout, kesalahan pada cekCookie: '.json_encode($ambilCookie));
            }


        }catch(Exception $e){

            log_message('error', $e->getMessage());
            return false;

        }

    }

    public function tambahAdmin(string $nama, string $email, string $password): bool
    {
        $adminModel = new AdminModel();



        if (empty($nama) || empty($email) || empty($password)) {

            return false;
        } else {

            $tanggal = date('YmdHis');
            $randomNumber = rand(1000, 9999);
            $idAdmin = 'Admin' . $tanggal . $randomNumber;

            $password = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'idAdmin' => $idAdmin,
                'nama' => $nama,
                'email' => $email,
                'password' => $password
            ];

            $adminModel->insert($data);
            return true;
        }
    }

    public function editAkun(string $idAdmin, string $nama, string $email, string $password)
    {

        try {

            if (empty($idAdmin) || empty($nama) || empty($email)) {

                throw new Exception("data tidak boleh kosong");
            } else {

                $adminModel = new AdminModel();

                if (empty($password) || $password == '') {

                    $data = [
                        'nama' => $nama,
                        'email' => $email,
                    ];
                } else {

                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $data = [
                        'nama' => $nama,
                        'email' => $email,
                        'password' => $password
                    ];
                }

                $adminModel->update($idAdmin, $data);
                return true;
            }
        } catch (Exception $e) {

            log_message("error", $e->getMessage());
            return false;
        }
    }

    public function ambilAdmin(string $email)
    {
        try {

            if (empty($email)) {

                throw new Exception("email kosong");
            } else {

                $adminModel = new AdminModel();
                $ambilAkun = $adminModel->where("email", $email)->first();

                if ($ambilAkun !== null) {

                    return $ambilAkun;
                } else {

                    throw new Exception("akun tidak ditemukan");
                }
            }
        } catch (Exception $e) {

            log_message("error", $e->getMessage());
            return false;
        }
    }

    public function cekEmail(string $email)
    {

        try {

            if (empty($email)) {

                throw new Exception("email kosong");
            } else {

                $adminModel = new AdminModel();
                $data = $adminModel->where('email', $email)->first();

                if ($data !== null) {

                    throw new Exception("email sudah terdaftar");
                } else {

                    return true;
                }
            }
        } catch (Exception $e) {

            log_message("error", $e->getMessage());
            return false;
        }
    }
}
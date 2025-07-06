<?php

namespace App\Libraries;

use App\Models\SessionModel;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once __DIR__ . '/../../vendor/autoload.php';

class SessionLibrary
{

    public function buatToken(string $email)
    {

        try {

            if (empty($email)) {

                throw new Exception('Email tidak boleh kosong');
            }

            // Kunci untuk enkripsi JWT
            $key = 'Test12345';

            //payload untuk Jwt
            $payload = [
                'iss' => 'http://localhost:8080/',  // Issuer untuk pengembangan lokal
                'aud' => 'http://localhost:8080/',  // Audience untuk pengembangan lokal
                'iat' => time(),                    // Issued At
                'exp' => time() + 3600,             // Expiration Time (1 hour)
                'data' => [
                    'email' => $email
                ]
            ];

            //proses encode
            $jwt = JWT::encode($payload, $key, 'HS256');
            $this->buatCookie($jwt);
            $this->buatTokenDatabase($jwt, $email);

            return $jwt;
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function buatTokenDatabase(string $jwt, string $email)
    {

        try {

            if (empty($jwt) || empty($email)) {

                throw new Exception('email atau token jwt tidak boleh kosong');
            }

            $tanggal = date('YmdHis');
            $randomNumber = rand(1000, 9999);
            $idSession = 'Session' . $tanggal . $randomNumber;

            $sessionModel = new SessionModel();
            $cekToken = $sessionModel->select('idSession')->where('email', $email)->first();

            if ($cekToken !== null) {

                $data = [
                    'jwt' => $jwt
                ];

                $sessionModel->update($cekToken['idSession'], $data);
                return true;
            } else {

                $data = [
                    'idSession' => $idSession,
                    'jwt' => $jwt,
                    'email' => $email
                ];

                $sessionModel->insert($data);
                return true;
            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function hapusToken()
    {

        try {

            if (isset($_COOKIE['tokenSesi'])) {

                if ($this->cekToken()) {

                    $sessionModel = new SessionModel();
                    $sessionModel->where('jwt', $_COOKIE['tokenSesi'])->delete();
                    return true;
                } else {

                    throw new Exception('token sesi tidak sama');
                }
            } else {

                throw new Exception('token sesi tidak tersedia');
            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function cekToken()
    {

        try {

            if (isset($_COOKIE['tokenSesi'])) {

                $sessionModel = new SessionModel();
                $cekToken = $sessionModel->select('email')->where('jwt', $_COOKIE['tokenSesi'])->first();

                if ($cekToken !== null) {

                    return $cekToken['email'];
                } else {

                    throw new Exception('maaf, token sesi tidak ada didatabase');
                }
            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    //Kode Cookie

    public function buatCookie(string $jwt)
    {

        setcookie('tokenSesi', $jwt, time() + 3600, '/');
    }

    public function cekCookie()
    {

        try {

            // Kunci yang digunakan untuk verifikasi JWT
            $secretKey = 'Test12345';

            if (isset($_COOKIE['tokenSesi'])) {

                $jwt = $_COOKIE['tokenSesi'];

                // Mendekode token
                $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));

                if ($this->cekToken()) {

                    // Mengembalikan email yang ditemukan dalam token
                    return $decoded->data->email;

                } else {

                    throw new Exception('cookie dan token databsae tidak sesuai');
                }
            } else {

                throw new Exception('maaf cookie kosong');
            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function hapusCookie()
    {

        try {

            if (!isset($_COOKIE['tokenSesi'])) {

                return true;

            } else {

                if($this->hapusToken()){

                    setcookie('tokenSesi', '', time() - 3600, '/');
                    return true;

                }else{

                    setcookie('tokenSesi', '', time() - 3600, '/');
                    return true;
                    
                }
            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }
}

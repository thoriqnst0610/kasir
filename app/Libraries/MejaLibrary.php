<?php

namespace App\Libraries;

use App\Models\MejaModel;
use Exception;

class MejaLibrary{

    public function show(){

        $mejaModel = new MejaModel();
        return $mejaModel->findAll();
        
    }

    public function save(string $noMeja){

        try{

            if(empty($noMeja)){

                throw new Exception('no meja tidak boleh kosong');

            }else{

                $mejaModel = new  MejaModel();
                $tanggal = date('YmdHis');
                $randomNumber = rand(1000, 9999);
                $idMeja = 'Meja' . $tanggal . $randomNumber;
                $data = [
                    'idMeja' => $idMeja,
                    'noMeja' => $noMeja
                ];

                $mejaModel->insert($data);
                return true;
                
            }

        }catch(Exception $e){

            log_message('error', $e->getMessage());
            return false;

        }

    }

    public function update(string $idMeja, string $noMeja){

        try{

            if(empty($noMeja) || empty($idMeja)){

                throw new Exception('no meja tidak boleh kosong');

            }else{

                $mejaModel = new  MejaModel();
                $data = [
                    'noMeja' => $noMeja
                ];

                $mejaModel->update($idMeja, $data);
                return true;
                
            }

        }catch(Exception $e){

            log_message('error', $e->getMessage());
            return false;

        }
        
    }

    public function delete(string $idMeja){

        try{

            if(empty($idMeja)){

                throw new Exception('id meja tidak boleh kosong');

            }else{

                $mejaModel = new  MejaModel();

                $mejaModel->delete($idMeja);
                return true;
                
            }

        }catch(Exception $e){

            log_message('error', $e->getMessage());
            return false;

        }
        
    }
}
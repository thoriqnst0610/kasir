<?php

namespace App\Libraries;

use App\Models\MenuModel;
use Exception;

class MenuLibrary
{

    public function show()
    {

        $menuModel = new MenuModel();
        return $menuModel->findAll();
    }

    public function save(string $namaMenu, string $harga, string $kategoriMenu, string $gambarMenu)
    {

        $menuModel = new MenuModel();

        try {

            if (empty($namaMenu) || empty($harga) || empty($kategoriMenu) || empty($gambarMenu)) {

                throw new Exception('error nama menu, harga, kategori, gambar tidak ada yang boleh kosong');

            }else{

                $tanggal = date('YmdHis');
                $randomNumber = rand(1000, 9999);
                $idMenu = 'Menu' . $tanggal . $randomNumber;

                $data = [
                    'idMenu' => $idMenu,
                    'namaMenu' => $namaMenu,
                    'hargaMenu' => $harga,
                    'kategoriMenu' => $kategoriMenu,
                    'gambarMenu' => $gambarMenu

                ];

                $menuModel->insert($data);
                return true;

            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function update(string $idMenu, string $namaMenu, string $harga, string $kategoriMenu, string $gambarMenu) {

        $menuModel = new MenuModel();

        try {

            if (empty($idMenu) || empty($namaMenu) || empty($harga) || empty($kategoriMenu) || empty($gambarMenu)) {

                throw new Exception('error id menu, nama menu, harga, kategori, gambar tidak ada yang boleh kosong');

            }else{

                $data = [
                    'namaMenu' => $namaMenu,
                    'hargaMenu' => $harga,
                    'kategoriMenu' => $kategoriMenu,
                    'gambarMenu' => $gambarMenu

                ];

                $menuModel->update($idMenu, $data);
                return true;

            }
        } catch (Exception $e) {

            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function delete(string $idMenu) {

        $menuModel = new MenuModel();

        try{

            if(empty($idMenu)){

                throw new Exception('error id menu tidak ditemukan');

            }else{

                $menuModel->delete($idMenu);
                return true;
                
            }

        }catch(Exception $e){

            log_message('error', $e->getMessage());
            return false;

        }
    }
}

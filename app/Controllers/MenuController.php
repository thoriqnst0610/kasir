<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MenuLibrary;

class MenuController extends BaseController
{

    public function menampilkanData()
    {

        $menuLibrary = new MenuLibrary();
        $data = $menuLibrary->show();

        return view('Admin/header', ['data' => $data]) . view('Admin/menu') . view('Admin/footer');
    }

    public function menambahData()
    {

        $menuLibrary = new MenuLibrary();

        $namaMenu = filter_var($this->request->getPost('namaMenu'), FILTER_SANITIZE_SPECIAL_CHARS);
        $hargaMenu = $this->request->getPost('hargaMenu');
        $kategoriMenu = filter_var($this->request->getPost('kategoriMenu'), FILTER_SANITIZE_SPECIAL_CHARS);

        $validasiGambar = \Config\Services::validation();
        $gambarMenu = $this->request->getFile('gambarMenu');

        //cek apakah valid
        if ($gambarMenu->isValid()) {

            $namaGambar = $gambarMenu->getRandomName();
            $folderGambar = ROOTPATH . 'public/gambarMenu';

            //melakukan validasi gambar sebelum di simpan
            $pengaturanGambar = [
                'gambarMenu' => [
                    'uploaded[gambarMenu]',
                    'is_image[gambarMenu]',
                    'mime_in[gambarMenu,image/jpg,image/jpeg,image/png,image/gif]',
                    'max_size[gambarMenu,1048]'
                ]
            ];
        } else {

            return redirect()->back()->with('error', 'gambar tidak ditemukan');
        }


        if (!$validasiGambar->setRules($pengaturanGambar)->run()) {

            return redirect()->back()->with('error', implode(', ', $validasiGambar->getErrors()));
        } else {

            if ($gambarMenu->move($folderGambar, $namaGambar)) {

                if ($menuLibrary->save($namaMenu, $hargaMenu, $kategoriMenu, $namaGambar)) {

                    return redirect()->to('/menu')->with('success', 'menu ditambah');
                } else {

                    return redirect()->back()->with('error', 'gagal menambah menu');
                }
            } else {

                return redirect()->back()->with('error', 'gagal mengupload gambar');
            }
        }
    }

    public function mengubahData()
    {

        $menuLibrary = new MenuLibrary();

        $namaMenu = filter_var($this->request->getPost('namaMenu'), FILTER_SANITIZE_SPECIAL_CHARS);
        $idMenu = filter_var($this->request->getPost('idMenu'), FILTER_SANITIZE_SPECIAL_CHARS);
        $hargaMenu = $this->request->getPost('hargaMenu');
        $kategoriMenu = filter_var($this->request->getPost('kategoriMenu'), FILTER_SANITIZE_SPECIAL_CHARS);
        $gambarMenuLama = filter_var($this->request->getPost('gambarMenuLama'), FILTER_SANITIZE_SPECIAL_CHARS);

        $validasiGambar = \Config\Services::validation();
        $gambarMenuBaru = $this->request->getFile('gambarMenuBaru');

        //cek apakah valid
        if ($gambarMenuBaru->isValid()) {

            $namaGambar = $gambarMenuBaru->getRandomName();
            $folderGambar = ROOTPATH . 'public/gambarMenu';

            //melakukan validasi gambar sebelum di simpan
            $pengaturanGambar = [
                'gambarMenuBaru' => [
                    'uploaded[gambarMenuBaru]',
                    'is_image[gambarMenuBaru]',
                    'mime_in[gambarMenuBaru,image/jpg,image/jpeg,image/png,image/gif]',
                    'max_size[gambarMenuBaru,1048]'
                ]
            ];
        } else {

            return redirect()->back()->with('error', 'gambar tidak ditemukan');
        }

        if (!$validasiGambar->setRules($pengaturanGambar)->run()) {

            return redirect()->back()->with('error', implode(', ', $validasiGambar->getErrors()));
        } else {

            if ($gambarMenuBaru->move($folderGambar, $namaGambar)) {

                if ($menuLibrary->update($idMenu, $namaMenu, $hargaMenu, $kategoriMenu, $namaGambar)) {

                    //hapus gambar lama
                    unlink(ROOTPATH.'public/gambarMenu/'.$gambarMenuLama);

                    return redirect()->to('/menu')->with('success', 'menu diubah');

                } else {

                    return redirect()->back()->with('error', 'gagal mengubah menu');
                }
            } else {

                return redirect()->back()->with('error', 'gagal mengupload gambar');
            }
        }

    }

    public function menghapusData() {

        $menuLibrary = new MenuLibrary();

        $idMenu = filter_var($this->request->getPost('idMenu'), FILTER_SANITIZE_SPECIAL_CHARS);
        $gambarMenu = filter_var($this->request->getPost('gambarMenu'), FILTER_SANITIZE_SPECIAL_CHARS);

        if($menuLibrary->delete($idMenu)){

            //hapus gambar
            unlink(ROOTPATH.'public/gambarMenu/'.$gambarMenu);
            return redirect()->to('/menu')->with('success', 'data dihapus');

        }else{

            return redirect()->back()->with('error', 'gagal menghapus data');

        }

    }
}

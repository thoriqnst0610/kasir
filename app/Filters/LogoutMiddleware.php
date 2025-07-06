<?php

namespace App\Filters;

use App\Libraries\SessionLibrary;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LogoutMiddleware implements FilterInterface{

    //wajib di buat
    public function before(RequestInterface $request, $arguments = null)
    {

        $sessionLibrary = new SessionLibrary();
        $cekCookie = $sessionLibrary->cekCookie();

        if($cekCookie == false){

            return redirect()->to('/');
        }
        
    }

    //wajib dibuat
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }

}
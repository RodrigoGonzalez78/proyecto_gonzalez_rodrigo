<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data['titulo'] = 'Inicio';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/home');
        echo view('front/footer_view');
    }
}

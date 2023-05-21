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

    public function contact()
    {

        $data['titulo'] = 'Contacto';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/contact');
        echo view('front/footer_view');
    }

    public function about()
    {

        $data['titulo'] = 'Sobre Nosotros';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/about');
        echo view('front/footer_view');
    }

    
    public function termsanduses()
    {

        $data['titulo'] = 'Terminos y usos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/termsanduses');
        echo view('front/footer_view');
    }
    
   
}

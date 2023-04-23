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

    public function products()
    {

        $data['titulo'] = 'Productos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/products');
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
    public function login()
    {

        $data['titulo'] = 'Login';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/login');
        echo view('front/footer_view');
    }
    public function signup()
    {

        $data['titulo'] = 'Sign-Up';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/sign_up');
        echo view('front/footer_view');
    }
}

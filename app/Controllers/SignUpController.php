<?php

namespace App\Controllers;

use App\Models\User;


class SignUpController extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url']);
    }
    public function create()
    {
        
        $data['titulo'] = 'Sign-Up';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/users/sign_up');
        echo view('front/footer_view');
    }

    public function formValidation()
    {

        $input = $this->validate(
            [
                'name'   => 'required|min_length[3]',
                'last_name' => 'required|min_length[3]|max_length[25]',
                'email'    => 'required|min_length[5]|max_length[100]|valid_email|is_unique[users.email]',
                'password'     => 'required|min_length[8]|max_length[10]'
            ],

        );

        $user = new User();

        if (!$input) {


            $data['titulo'] = 'Sign-Up';
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/users/sign_up', ['validation' => $this->validator]);
            echo view('front/footer_view');

            
        } else {



            $user->save([
                'name' => $this->request->getVar('name'),
                'last_name' => $this->request->getVar('last_name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);
        

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            session()->setFlashdata('success', 'Usuario registrado con exito');
            return $this->response->redirect(site_url('/signup'));
        }
    }
}

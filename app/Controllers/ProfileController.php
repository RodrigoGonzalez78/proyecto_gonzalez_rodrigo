<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }


    public function userProfile()
    {
        $data['titulo'] = 'Mis Datos';
        $data['user'] = User::getUser(session()->user_id);

        if ($data['user']['id_address'] == null) {
            $data['address'] = [
                'street' => 'Vacio',
                'postal_code' => 'Vacio',
                'neighborhood' => 'Vacio',
                'city' => 'Vacio'
            ];
        } else {
            $data['address'] = Address::getAddress($data['user']['id_address']);
        }

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/users/user_profile', $data);
        echo view('front/footer_view');
    }

    public function updatePassword()
    {
        $input = $this->validate([
            'password'     => 'required|min_length[8]|max_length[10]'
        ]);

        if (!$input) {


            $data['titulo'] = 'Mis Datos';
            $data['user'] = User::getUser(session()->user_id);

            if ($data['user']['id_address'] == null) {
                $data['address'] = [
                    'street' => 'Vacio',
                    'postal_code' => 'Vacio',
                    'neighborhood' => 'Vacio',
                    'city' => 'Vacio'
                ];
            } else {
                $data['address'] = Address::getAddress($data['user']['id_address']);
            }

            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/users/user_profile', ['validation' => $this->validator, $data]);
            echo view('front/footer_view');
        } else {


            User::updateUser(session()->user_id, [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);

            return redirect()->to('/user-profile')->with('success', 'Contraseña  actualisada  con exito!');

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de car
        }
    }


    public function updateUser()
    {
        $input = $this->validate([
            'name'   => 'required|min_length[3]',
            'last_name' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email',
        ]);


        if (!$input) {

            $data['titulo'] = 'Mis Datos';
            $data['user'] = User::getUser(session()->user_id);

            if ($data['user']['id_address'] == null) {
                $data['address'] = [
                    'street' => 'Vacio',
                    'postal_code' => 'Vacio',
                    'neighborhood' => 'Vacio',
                    'city' => 'Vacio'
                ];
            } else {
                $data['address'] = Address::getAddress($data['user']['id_address']);
            }

            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/users/user_profile', ['validation' => $this->validator, $data]);
            echo view('front/footer_view');
        } else {
            $data = [
                'name' => $this->request->getVar('name'),
                'last_name' => $this->request->getVar('last_name'),
                'email' => $this->request->getVar('email'),

            ];

            User::updateUser(session()->user_id, $data);

            return redirect()->to('/user-profile')->with('success', 'Datos actualisados  con exito!');
        }
    }


    public function updateAddress()
    {
        $data['user'] = User::getUser(session()->user_id);

        $input = $this->validate([
            'street'    => 'required',
            'postal_code' => 'required',
            'neighborhood'    => 'required',
            'city'    => 'required',
        ]);

        if (!$input) {

            $data['titulo'] = 'Mis Datos';


            if ($data['user']['id_address'] == null) {
                $data['address'] = [
                    'street' => 'Vacio',
                    'postal_code' => 'Vacio',
                    'neighborhood' => 'Vacio',
                    'city' => 'Vacio'
                ];
            } else {
                $data['address'] = Address::getAddress($data['user']['id_address']);
            }

            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/users/user_profile', ['validation' => $this->validator, $data]);
            echo view('front/footer_view');
        } else {

            $address = [
                'street' => $this->request->getVar('street'),
                'postal_code' => $this->request->getVar('postal_code'),
                'neighborhood' => $this->request->getVar('neighborhood'),
                'city' => $this->request->getVar('city'),


            ];

            if ($data['user']['id_address'] == null) {

                $idAdress = Address::createAddress($address);
                
                User::updateUser(session()->user_id, ['id_address' => $idAdress]);

            } else {
                Address::updateAddress($data['user']['id_address'], $address);
            }

            return redirect()->to('/user-profile')->with('success', 'Direccion actualisada  con exito!');
        }
    }
}

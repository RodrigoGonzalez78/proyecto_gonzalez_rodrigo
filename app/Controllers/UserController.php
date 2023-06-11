<?php

namespace App\Controllers;

use App\Models\Profile;
use App\Models\User;

class UserController extends BaseController
{
  public function __construct()
  {
    helper(['form', 'url']);
  }

  public function index()
  {
    $data['titulo'] = 'Usuarios';
    $userModel = new User();
    $data['users'] = $userModel->findAll();
    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/users/user_list');
    echo view('front/footer_view'); // Mostrar la vista de inicio de sesión
  }

  public function editUser()
  {
    $data['profiles'] = Profile::getProfiles();
    $data['user'] = User::getUser(intval($this->request->getVar('id')));
    $data['titulo'] = 'Editar Usuario';

    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/users/edit_user', $data);
    echo view('front/footer_view');
  }


  public function updateUser()
  {
    $input = $this->validate([
      'name'   => 'required|min_length[3]',
      'last_name' => 'required|min_length[3]|max_length[25]',
      'email'    => 'required|min_length[4]|max_length[100]|valid_email',
      //|is_unique[users.email]
      'id_profile' => 'is_not_unique[profile.id]',
    ]);


    if (!$input) {
      $data['profiles'] = Profile::getProfiles();
      $data['user'] = User::getUser(intval($this->request->getVar('id')));
      $data['titulo'] = 'Editar Usuario';

      echo view('front/head_view', $data);
      echo view('front/nav_view');
      echo view('back/users/edit_user', ['validation' => $this->validator, $data]);
      echo view('front/footer_view');
    } else {
      $data = [
        'name' => $this->request->getVar('name'),
        'last_name' => $this->request->getVar('last_name'),
        'email' => $this->request->getVar('email'),
        'id_profile' => $this->request->getVar('id_profile')
      ];
      $id = intval($this->request->getVar('id'));

      User::updateUser($id, $data);

      return redirect()->to('/users')->with('success', 'Usuario actualisado  con exito!');
    }
  }

  public function enableUser()
  {
    $data = [
      'down' => 'NO'
    ];
    $id = intval($this->request->getVar('id'));
    User::updateUser($id, $data);
    return redirect()->to('/users')->with('success', 'Usuario activado con exito!');
  }

  public function disableUser()
  {
    $data = [
      'down' => 'SI'
    ];
    $id = intval($this->request->getVar('id'));
    User::updateUser($id, $data);
    return redirect()->to('/users')->with('success', 'Usuario desactivado con exito!');
  }
}

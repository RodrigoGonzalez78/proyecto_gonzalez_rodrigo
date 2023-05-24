<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Controller;

class UserController extends Controller
{
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

  
}

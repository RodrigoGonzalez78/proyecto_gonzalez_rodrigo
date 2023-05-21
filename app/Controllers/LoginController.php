<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Controller;

class LoginController extends Controller
{
  public function index()
  {
    $data['titulo'] = 'Login';
    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('back/users/login');
    echo view('front/footer_view'); // Mostrar la vista de inicio de sesión
  }

  public function login()
  {
    $session = session();

    // Obtener los datos del formulario de inicio de sesión
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Buscar el usuario en la base de datos
    $userModel = new User();
    $user = $userModel->where('email', $email)->first();

    if ($user) {
      // Verificar la contraseña
      if (password_verify($password, $user['password'])) {

        // Iniciar sesión y almacenar los datos del usuario en la sesión
        $sessionData = [
          'user_id' => $user['id'],
          'name' => $user['name'],
          'last_name' => $user['last_name'],
          'email' => $user['email'],
          'access' => $user['access'],
          'logged_in'=> TRUE
        ];

        $session->set($sessionData);


        // Redirigir al usuario a la página de inicio o a otra página deseada
        return redirect()->to('/')->with('success', 'Inicio de sesión exitoso. '. $user['name'] . '!');
      }
    }

    // Si el inicio de sesión falla, redirigir al usuario a la página de inicio de sesión con un mensaje de error
    return redirect()->to('/login')->with('error', 'Credenciales inválidas. ');
  }

  public function logout()
  {
    $session = session();

    // Destruir la sesión y redirigir al usuario a la página de inicio o a otra página deseada
    $session->destroy();
    return redirect()->to('/login')->with('success', 'Cierre de sesión exitoso');
  }
}

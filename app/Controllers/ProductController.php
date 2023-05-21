<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        
        $data['titulo'] = 'Productos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/products');
        echo view('front/footer_view');
    }


    //(route/(:parametro)), function/$1

    public function createProduct(){
        $data['titulo'] = 'Agregar Producto';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/new_product');
        echo view('front/footer_view');

    }

    public function deleteProduct(){
        

    }

    public function editProduct(){
        
    }


}

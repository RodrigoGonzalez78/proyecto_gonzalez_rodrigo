<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use CodeIgniter\Controller;

class ProductController extends Controller
{


    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $products= new Product();
        $data['products'] = $products->findAll();
        $data['titulo'] = 'Productos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/products',$data);
        echo view('front/footer_view');
    }


    public function newProduct()
    {
        $categorieModel = new Categorie();
        $data['categories'] = $categorieModel->findAll();

        $data['titulo'] = 'Agregar Producto';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/new_product', $data);
        echo view('front/footer_view');
    }

    public function storeProduct()
    {
       
        $input = $this->validate([
            'name' => 'required|min_length[2]',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'id_categorie' => 'is_not_unique[categories.id]',
            

        ]);



        if (!$input) {
            $categorieModel = new Categorie();
            $data['categories'] = $categorieModel->findAll();

            $data['titulo'] = 'Agregar Producto';
            
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/products/new_product', ['validation' => $this->validator, $data]);
            echo view('front/footer_view');
        } else {

            $image = $this->request->getFile('image');
            $alet_name = $image->getRandomName();
            $image->move(ROOTPATH . 'assets/uploads', $alet_name);

            $data = [
                'name' => $this->request->getVar('name'),
                'image' => $image->getName(),
                'price' => $this->request->getVar('price'),
                'stock' => $this->request->getVar('stock'),
                'description' => $this->request->getVar('description'),
                'id_categorie' => $this->request->getVar('id_categorie')
            ];

            $product = new Product();
            $product->insert($data);
            return redirect()->to('/products')->with('success', 'Producto creado con exito!');
        }
    }
}

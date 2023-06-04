<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use CodeIgniter\Controller;

class ProductController extends BaseController
{


    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {

        $data['categories'] = Categorie::getCategories();
        $data['products'] = Product::getEnabledProducts();
        $data['titulo'] = 'Productos';

        
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/products', $data);
        echo view('front/footer_view');
    }



    public function disabledProducts()
    {

        $data['products'] = Product::getDisabledProducts();
        $data['titulo'] = 'Productos desactivados';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/disabled_products', $data);
        echo view('front/footer_view');
    }


    public function newProduct()
    {

        $data['categories'] = Categorie::getCategories();
        $data['titulo'] = 'Agregar Producto';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/new_product', $data);
        echo view('front/footer_view');
    }

    public function editProduct()
    {

        $data['categories'] = Categorie::getCategories();
        $data['product'] = Product::getProduct(intval($this->request->getVar('id')));
        $data['titulo'] = 'Agregar Producto';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/edit_product', $data);
        echo view('front/footer_view');
    }

    public function filterProducts()
    {

        $data['categories'] = Categorie::getCategories();

        $searchWord = $this->request->getVar('search');
        $id_categorie = $this->request->getVar('id_categorie');

        $data['products'] = Product::searchProducts($searchWord, $id_categorie);


        $data['titulo'] = 'Productos';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/products', $data);
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
            'image' => 'uploaded[image]|ext_in[image,jpg,png]'

        ]);



        if (!$input) {

            $data['categories'] = Categorie::getCategories();
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


            Product::createProduct($data);
            return redirect()->to('/products')->with('success', 'Producto creado con exito!');
        }
    }


    public function updateProduct()
    {

        $input = $this->validate([
            'name' => 'required|min_length[2]',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'id_categorie' => 'is_not_unique[categories.id]',
            'image' => 'ext_in[image,jpg,png]'

        ]);



        if (!$input) {

            $data['categories'] = Categorie::getCategories();
            $data['titulo'] = 'Agregar Producto';

            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/products/new_product', ['validation' => $this->validator, $data]);
            echo view('front/footer_view');
        } else {
            $image = $this->request->getFile('image');
            $data = [
                'name' => $this->request->getVar('name'),
                'price' => $this->request->getVar('price'),
                'stock' => $this->request->getVar('stock'),
                'description' => $this->request->getVar('description'),
                'id_categorie' => $this->request->getVar('id_categorie')
            ];


            if ($image->isValid()) {
                $alet_name = $image->getRandomName();
                $image->move(ROOTPATH . 'assets/uploads', $alet_name);

                $data['image'] = $image->getName();
            }

            $id = intval($this->request->getVar('id'));
            Product::updateProduct($id, $data);
            return redirect()->to('/products')->with('success', 'Producto actualisado  con exito!');
        }
    }


    public function disableProduct()
    {
        $data = [
            'down' => 'SI'
        ];
        $id = intval($this->request->getVar('id'));
        Product::updateProduct($id, $data);
        return redirect()->to('/products')->with('success', 'Producto desactivado  con exito!');
    }


    public function enableProduct()
    {
        $data = [
            'down' => 'NO'
        ];
        $id = intval($this->request->getVar('id'));
        Product::updateProduct($id, $data);
        return redirect()->to('/disableds-products')->with('success', 'Producto activado con exito!');
    }
}

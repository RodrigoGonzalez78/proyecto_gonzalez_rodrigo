<?php

namespace App\Controllers;

use App\Models\Product;
use CodeIgniterCart\Cart;

class CartController extends BaseController
{

    public function _construct(){
        helper(['form','url','cart']);
        $session= session();
        $cart=\Config\Services::cart();
    }


    public function index(){

        $cart =\Config\Services::cart();
       
       
        $data['products'] = $cart->contents();
        $data['titulo'] = 'Carrito';

        
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/products/cart_list', $data);
        echo view('front/footer_view');

    }


    public function addCartProduct(){

        $cart =\Config\Services::cart();
        $product = Product::getProduct($this->request->getVar('id'));

        $cart->insert(array(
            'id'=>$product['id'],
            'qty'=> 1,
            'price'=> $product['price'],
            'name'=>$product['name'],
            
        ));


        return redirect()->to('/products')->with('success', 'Agregado al carrito! ');

    }


    public function updateCartProduct(){

        $cart =\Config\Services::cart();
        $request = \Config\Services::cart();

        $cart->update(array(
            'id'=>$request->getPost('id'),
            'qty'=> $request->getPost('count'),
            'price'=> $request->getPost('price')
        ));

        redirect()->back()->withInput();

    }

    public function addCountProductCart(){
        $cart =\Config\Services::cart();
        $product = Product::getProduct($this->request->getVar('id'));

        $cart->update($product['id'],1);

        return redirect()->to('/cart-list');


    }

   

    public function clearCartProducts(){
        $cart =\Config\Services::cart();
        $cart->destroy();
        return redirect()->to('/cart-list');
    }
}
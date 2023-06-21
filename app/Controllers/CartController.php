<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use App\Models\User;
use CodeIgniterCart\Cart;

class CartController extends BaseController
{

    public function _construct()
    {
        helper(['form', 'url', 'cart']);
        $session = session();
        $cart = \Config\Services::cart();
    }


    public function index()
    {

        $cart = \Config\Services::cart();


        $data['products'] = $cart->contents();
        $data['titulo'] = 'Carrito';


        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/cart/cart_list', $data);
        echo view('front/footer_view');
    }


    public function addCartProduct()
    {

        $cart = \Config\Services::cart();

        $product = Product::getProduct($this->request->getVar('id'));

        $stock = $product['stock'];
        $contenido = $cart->contents();
        $encontrado = false;

        foreach ($contenido as $item) {
            //Encuento el producto si ya se agrego
            if ($item['id'] == $product['id']) {

                //Verifico stock
                if ($item['qty'] + 1 <= $stock) {

                    $cart->update(array(
                        'rowid' => $item['rowid'],
                        'qty' => $item['qty'] + 1,
                    ));

                    return redirect()->to('/products')->with('success', 'Agregado al carrito! ');
                } else {
                    //Muestra mensaje si superoel stcok disponible
                    return redirect()->to('/cart-list')->with('error', 'La cantidad solicitada supera el stock disponible.');
                }

                //Bandera de encotrado el producto
                $encontrado = true;
            }
        }

        //Si no se existia fuciona normalmente
        if (!$encontrado) {

            if ($stock >= 1) {
                $cart->insert(array(
                    'id' => $product['id'],
                    'qty' => 1,
                    'price' => $product['price'],
                    'name' => $product['name'],
                    'image' => $product['image'],
                    'stock' => $product['stock'],

                ));

                return redirect()->to('/products')->with('success', 'Agregado al carrito! ');
            } else {
                return redirect()->to('/cart-list')->with('error', 'Sin Stock!');
            }
        }
    }

   


    public function addCountProductCart()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getVar('rowid');
        $count = $this->request->getVar('count');

        // Obtener información del producto
        $productInfo = Product::getProduct($cart->contents()[$rowid]['id']);


        // Verificar disponibilidad en el stock
        $availableStock = $productInfo['stock'];

        $newCount = $count + 1;

        if ($newCount <= $availableStock) {
            $cart->update(array(
                'rowid' => $rowid,
                'qty' => $newCount,
            ));
        } else {
            // Si la cantidad excede el stock disponible, muestra un mensaje de error o realiza alguna otra acción
            return redirect()->to('/cart-list')->with('error', 'La cantidad solicitada supera el stock disponible.');
        }

        return redirect()->to('/cart-list');
    }

    public function restCountProductCart()
    {

        $cart = \Config\Services::cart();
        $rowid = $this->request->getVar('rowid');
        $count = $this->request->getVar('count');

        if ($count - 1 > 0) {
            $cart->update(array(
                'rowid' => $rowid,
                'qty' => $count - 1,
            ));
        } else {
            $cart->remove($rowid);
        }
        return redirect()->to('/cart-list');
    }

    public function removeProductCart()
    {
        $cart = \Config\Services::cart();
        $rowid = $this->request->getVar('rowid');
        $cart->remove($rowid);
        return redirect()->to('/cart-list');
    }



    public function clearCartProducts()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to('/cart-list');
    }

    public function createSale()
    {
        $user = User::getUser(session()->user_id);
        if ($user['id_address'] == null) {
            return redirect()->to('/user-profile')->with('error', 'Por favor actualise su dirección primero.');
        }
        $cart = \Config\Services::cart();

        $products = $cart->contents();
        $totalamount = 0;

        foreach ($products as $product) {
            $totalamount += $product['qty'] * $product['price'];
        }

        $sale = new Sale();
        $detailsSale = new SaleDetails();
        $productModel = new Product();

        $idSale = $sale->insert([
            'id_user' => session()->user_id,
            'total_price' => $totalamount
        ]);


        foreach ($products as $product) {
            $detailsSale->insert([
                'id_sale' => $idSale,
                'id_product' => $product['id'],
                'count' => $product['qty'],
                'price' => $product['price']
            ]);

            $productModel->update($product['id'], ['stock' => $product['stock'] - $product['qty']]);
        }

        $cart->destroy();

        return redirect()->to('/')->with('success', 'Compra exitosa');
    }
}

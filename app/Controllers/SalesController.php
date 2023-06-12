<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\Sale;
use App\Models\SaleDetails;
use App\Models\User;
use Dompdf\Dompdf;


class SalesController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {

        $data['titulo'] = 'Pedidos';

        $data['sales'] = Sale::allSales();
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/sales/list_sales_admin', $data);
        echo view('front/footer_view');
    }
    public function userSales()
    {

        $data['titulo'] = 'Mis Pedidos';

        $data['sales'] = Sale::userSales(session()->user_id);
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/sales/list_sales', $data);
        echo view('front/footer_view');
    }


    public function bill()
    {
        $id = $this->request->getVar('id');

        $data['titulo'] = 'Factura';
        $data['sale'] = Sale::findSale($id);
        $data['user'] = User::getUser($data['sale']['id_user']);
        $data['address'] = Address::getAddress($data['user']['id_address']);

        $data['saleDetails'] = SaleDetails::getSaleDetailsByIdAndProductName($data['sale']['id']);

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/sales/bill', $data);
        echo view('front/footer_view');
    }

    public function downloadBillPDF()
    {
        $id = $this->request->getVar('id');
        $data['sale'] = Sale::findSale($id);
        $data['user'] = User::getUser($data['sale']['id_user']);
        $data['address'] = Address::getAddress($data['user']['id_address']);
        $data['saleDetails'] = SaleDetails::getSaleDetailsByIdAndProductName($data['sale']['id']);

        // Cargar la vista en una variable
        $pdfContent = view('back/sales/bill', $data);

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($pdfContent);

        // Renderizar el PDF
        $dompdf->render();

        // Establecer el nombre del archivo PDF y enviarlo al navegador para su descarga
        $dompdf->stream('factura.pdf', ['Attachment' => true]);
    }
}

<?php

namespace App\Controllers;

use App\Models\Consult;

class ConsultsController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {

        $data['titulo'] = 'Contacto';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/consults/contact');
        echo view('front/footer_view');
    }

    public function createConsult()
    {

        $input = $this->validate(
            [
                'name'   => 'required|min_length[3]',
                'email'    => 'required|min_length[5]|max_length[100]|valid_email',
                'description' =>'required|max_length[150]'
            ],

        );

        $consult= new Consult();

        if (!$input) {


            $data['titulo'] = 'Contacto';
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('back/consults/contact',['validation' => $this->validator]);
            echo view('front/footer_view');
            
        } else {

            $consult->save([
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'description' => $this->request->getVar('description'),
            ]);


            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
            return redirect()->to('/contact')->with('success', 'Mensaje enviado!');
        }
    }


    public function consultsList(){
        $data['titulo'] = 'Cosultas';
        $data['consults']=Consult::getAllNewConsults();
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/consults/consult_list',$data);
        echo view('front/footer_view');
    }

    public function archivedConsultsList(){
        
        $data['titulo'] = 'Cosultas Archivadas';
        $data['consults']=Consult::getAllArchivedConsults();

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/consults/archived_consult_list',$data);
        echo view('front/footer_view');
    }


    public function archiveConsult()
    {
        $data = [
            'archived' => 'SI'
        ];
        $id = intval($this->request->getVar('id'));
        Consult::updateConsult($id, $data);
        return redirect()->to('/list-consults')->with('success', 'Consulta Archivada!');
    }

    public function attendedConsult()
    {
        $data = [
            'attended' => 'SI'
        ];
        $id = intval($this->request->getVar('id'));
        Consult::updateConsult($id, $data);
        return redirect()->to('/list-consults')->with('success', 'Consulta marcada como atendida');
    }
  
}

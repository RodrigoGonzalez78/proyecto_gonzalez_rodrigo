<?php
namespace App\Models;
use CodeIgniter\Model;

class Consult extends Model{
    protected $table='consults';
    protected $primaryKey= 'id';
    protected $allowedFields=['name','email','description','attended','archived','created_at'];


    public static function createConsult($data){
       $consult= new Consult();
       $consult->insert($data);
    }

    public static function getAllNewConsults(){
        $consult = new Consult();
        $builder = $consult->db->table($consult->table);
        $builder->where('archived', 'NO');

        $query = $builder->get();
        $consults = $query->getResultArray();

        return $consults;
    }

    public static function getAllArchivedConsults(){
        $consult = new Consult();
        $builder = $consult->db->table($consult->table);
        $builder->where('archived', 'SI');

        $query = $builder->get();
        $consults = $query->getResultArray();

        return $consults;
    }


    public static function updateConsult($id,$data){
        $consult= new Consult();
         $consult->update($id,$data);
    }
}

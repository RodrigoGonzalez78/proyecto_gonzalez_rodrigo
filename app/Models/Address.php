<?php
namespace App\Models;
use CodeIgniter\Model;

class Address extends Model{
    protected $table='address';
    protected $primaryKey= 'id';
    protected $allowedFields=['street','postal_code','neighborhood','city','created_at'];


    public static function createAddress($data){
       $address= new Address();
      return $address->insert($data);
    }
    public static function updateAddress($id,$data){
        $address= new Address();
        $address->update($id,$data);
    }

    public static function getAddress($id){
        $address= new Address();
        return $address->find($id);
    }
}
?>
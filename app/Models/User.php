<?php
namespace App\Models;
use CodeIgniter\Model;

class User extends Model{
    protected $table='users';
    protected $primaryKey= 'id';
    protected $allowedFields=['name', 'last_name','email','password','down','id_adress','id_profile','created_at'];

    public static function getUser($id){
        $user = new User();
        return $user->find($id);

    }

    public static function updateUser($id, $data){
        $user = new User();
        return $user->update($id,$data);
    }

}
?>
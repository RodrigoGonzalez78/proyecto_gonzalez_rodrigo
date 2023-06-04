<?php
namespace App\Models;
use CodeIgniter\Model;

class Profile extends Model{
    protected $table='profile';
    protected $primaryKey= 'id';
    protected $allowedFields=['descrition','created_at'];


    public static function getProfiles(){
        $categorie = new Profile();
        return $categorie->findAll();
    }
}
?>
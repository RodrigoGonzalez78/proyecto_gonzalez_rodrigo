<?php
namespace App\Models;
use CodeIgniter\Model;

class Product extends Model{
    protected $table='products';
    protected $primaryKey= 'id';
    protected $allowedFields=['name', 'price','stock','description','down','image','id_categorie','created_at'];
}
?>
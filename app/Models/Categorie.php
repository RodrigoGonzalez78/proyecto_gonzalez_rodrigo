<?php
namespace App\Models;
use CodeIgniter\Model;

class Categorie extends Model{
    protected $table='categories';
    protected $primaryKey= 'id';
    protected $allowedFields=['name','created_at'];
}
?>
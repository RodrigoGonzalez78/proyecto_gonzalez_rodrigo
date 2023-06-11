<?php
namespace App\Models;
use CodeIgniter\Model;

class Sale extends Model{
    protected $table='sales';
    protected $primaryKey= 'id';
    protected $allowedFields=['id_user','total_price','date','created_at'];


    public static function createSale($data)
    {
        $sale = new Sale();
        return $sale->insert($data);
    }

}
?>
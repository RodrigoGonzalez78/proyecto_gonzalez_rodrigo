<?php
namespace App\Models;
use CodeIgniter\Model;

class SaleDetails extends Model{
    protected $table='salesdetails';
    protected $primaryKey= 'id';
    protected $allowedFields=['id_sale','count','price','id_product','created_at'];


    public static function createSaleDetails($data)
    {
        $sale = new SaleDetails();
        return $sale->insert($data);
    }
}
?>
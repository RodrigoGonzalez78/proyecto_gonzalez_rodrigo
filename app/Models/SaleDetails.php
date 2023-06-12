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
    public static function getSaleDetailsByIdAndProductName($id)
    {
        $sale = new SaleDetails();
        $builder = $sale->db->table($sale->table);
        $builder->select('salesdetails.*, products.name');
        $builder->join('products', 'products.id = salesdetails.id_product');
        $builder->where('salesdetails.id_sale', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }
   
}
?>
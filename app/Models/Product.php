<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'price', 'stock', 'description', 'down', 'image', 'id_categorie', 'created_at'];

    public  static function getProduct($id)
    {
        $product = new Product();
        return $product->find($id);
    }

    public  static function getProducts()
    {
        $product = new Product();
        return $product->findAll();
    }


    public static function getDisabledProducts(){
        $product = new Product();
        $builder = $product->db->table($product->table);
        $builder->where('down', 'SI');

        $query = $builder->get();
        $products = $query->getResultArray();

        return $products;
    }

    public static function getEnabledProducts(){
        $product = new Product();
        $builder = $product->db->table($product->table);
        $builder->where('down', 'NO');

        $query = $builder->get();
        $products = $query->getResultArray();

        return $products;
    }

    public static function searchProducts($searchTerm, $category = 'Todos') {
        $product = new Product();
        $builder = $product->db->table($product->table);
        
        $builder->like('name', $searchTerm);
        
        if ($category != 'Todos') {
            $builder->where('id_categorie', $category);
        }
        $builder->where('down', 'NO');
        
        $query = $builder->get();
        $products = $query->getResultArray();
        
        return $products;
    }

    public  static function updateProduct($id, $data)
    {
        $product = new Product();
        return $product->update($id, $data);
    }


    public static function createProduct($data)
    {
        $product = new Product();
        return $product->insert($data);
    }
}

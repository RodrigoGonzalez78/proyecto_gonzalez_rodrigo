<?php

namespace App\Models;

use CodeIgniter\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'total_price', 'date', 'created_at'];


    public static function createSale($data)
    {
        $sale = new Sale();
        return $sale->insert($data);
    }
    public static function findSale($id)
    {
        $sale = new Sale();
        return $sale->find($id);
    }


    public static function allSales()
    {
        $sale = new Sale();

        // Realizar el join con la tabla de usuarios
        $builder = $sale->table($sale->table);
        $builder->select('sales.*, users.name, users.last_name,users.email ');
        $builder->join('users', 'users.id = sales.id_user');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public static function userSales($id)
    {
        $sale = new Sale();

        // Realizar la consulta para obtener los pedidos del usuario específico
        $builder = $sale->table($sale->table);
        $builder->select('sales.*, users.name, users.last_name, users.email');
        $builder->join('users', 'users.id = sales.id_user');
        $builder->where('users.id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre', 'descripcion', 'sku', 'precio', 'stock'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'nombre' => 'required',
        'sku' => 'required|regex_match[[0-9]{3}[-][0-9]{3}[-][0-9]{4}]',
        'precio' => 'required',
        'stock' => 'required',
    ];
    protected $validationMessages = [
        'nombre' => [
            'required' => 'Nombre del producto es requerido',
        ],
        'sku' => [
            'required' => 'SKU del producto es requerido',
            'regex_match' => 'SKU del producto debe de conincidir con 000-000-0000',
        ],
        'precio' => [
            'required' => 'Precio del producto es requerido',
        ],
        'stock' => [
            'required' => 'Stock del producto es requerido',
        ],
    ];
    protected $skipValidation     = false;
}
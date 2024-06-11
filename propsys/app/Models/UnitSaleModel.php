<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitSaleModel extends Model
{
    protected $table            = 'units_sale';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['property_sale_id', 'name', 'description', 'commission', 'deposit', 'price', 'booked', 'sold'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getUnitsForSale()
    {
        return $this->select('units_sale.id AS unit_id, property_sale.name AS property_name, property_sale.id AS property_id, units_sale.name AS unit_name, units_sale.booked AS booked, units_sale.sold AS sold, FORMAT(units_sale.price, 0) AS price, FORMAT(units_sale.commission, 0) AS commission, FORMAT(units_sale.deposit, 0) AS deposit')
                    ->join('property_sale', 'units_sale.property_sale_id = property_sale.id', 'left')
                    ->findAll();
    }
}

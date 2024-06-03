<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertySaleModel extends Model
{
    protected $table            = 'property_sale';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = ['name', 'landlord_id', 'no_of_units', 'location', 'image'];

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

    public function getPropertiesForSale()
    {
        return $this->select('property_sale.id AS property_id, property_sale.name AS property_name, property_sale.location, landlords.name AS landlord_name, property_sale.no_of_units AS number_of_units')
                    ->join('landlords', 'property_sale.landlord_id = landlords.id')
                    ->findAll();
    }
}

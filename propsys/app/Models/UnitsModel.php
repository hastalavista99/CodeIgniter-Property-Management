<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitsModel extends Model
{
    protected $table            = 'units_two';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['property_id', 'unit_name', 'unit_number', 'available', 'reserved', 'occupied'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getVacantUnits($propertyId)
    {
        return $this->where(['property_id' => $propertyId, 'available' => 'Yes'])
                    ->countAllResults();
    }

    public function getOccupiedUnits($propertyId)
    {
        return $this->where(['property_id' => $propertyId, 'occupied' => 'Yes'])
                    ->countAllResults();
    }

    public function getTotalUnits($propertyId)
    {
        return $this->where('property_id', $propertyId)
                    ->countAllResults();
    }

    public function getUnitsWithDetails()
    {
        return $this->select('units_two.id AS unit_id, properties.name AS property_name, units_two.unit_name AS unit_name, units_two.unit_number AS unit_number, units_two.available AS available, units_two.reserved AS reserved, units_two.occupied AS occupied, FORMAT(billing_two.rent, 0) AS rent, FORMAT(billing_two.commission, 0) AS commission, FORMAT(billing_two.deposit, 0) AS deposit')
                    ->join('properties', 'units_two.property_id = properties.id', 'left')
                    ->join('billing_two', 'units_two.id = billing_two.unit_id', 'left')
                    ->findAll();
    }
}

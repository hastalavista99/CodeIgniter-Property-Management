<?php

namespace App\Models;

use CodeIgniter\Model;

class TenantModel extends Model
{
    protected $table            = 'tenants_two';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'phone_number', 'id_number', 'contract', 'tenant_status', 'property_id', 'unit_id', 'billing_id'];

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

    public function getTenants($landlord_id = null)
    {
        $this->select('tenants_two.id AS id, tenants_two.name AS name, tenants_two.email AS email, tenants_two.phone_number AS phone_number, tenants_two.id_number AS id_number, tenants_two.tenant_status AS tenant_status, tenants_two.unit_id AS unit_id, properties.name AS property_name, units_two.unit_number AS unit_number')
            ->join('properties', 'tenants_two.property_id = properties.id', 'left')
            ->join('units_two', 'tenants_two.unit_id = units_two.id', 'left');
        
        // Apply filter if landlord_id is provided
        if ($landlord_id !== null) {
            $this->where('properties.landlord_id', $landlord_id);
        }
    
        return $this->findAll();
    }
}

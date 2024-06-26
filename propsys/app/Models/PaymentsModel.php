<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentsModel extends Model
{
    protected $table            = 'payment';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function getPayments()
    {
        return $this->select('payment.id, sell.id AS sell_id, sell.name AS buyer_name, property_sale.name AS property_name, units_sale.name AS unit_name, landlords.name AS landlord_name, FORMAT(payment.amount, 0) AS amount, payment.type_payment, payment.date')
                    ->join('sell', 'sell.id = payment.buyer_id', 'left')
                    ->join('units_sale', 'units_sale.id = sell.unit_id', 'left')
                    ->join('property_sale', 'property_sale.id = units_sale.property_sale_id', 'left')
                    ->join('landlords', 'landlords.id = property_sale.landlord_id', 'left')
                    ->findAll();
    }
}

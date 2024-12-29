<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['identification_number', 'first_name', 'last_name'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $validationRules = [
        'identification_number' => 'required|min_length[5]|is_unique[customers.identification_number]',
        'first_name' => 'required|min_length[2]',
        'last_name'  => 'required|min_length[2]',
    ];

    public function findByIdentification($identification)
    {
        return $this->where('identification_number', $identification)->first();
    }
}
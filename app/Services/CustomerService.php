<?php

namespace App\Services;

use App\Models\CustomerModel;

class CustomerService
{
    protected $customerModel;
    
    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }
    
    public function findByIdentification($identification)
    {
        return $this->customerModel->findByIdentification($identification);
    }
    
    public function getCustomerDetails($customerId)
    {
        return $this->customerModel->find($customerId);
    }
}
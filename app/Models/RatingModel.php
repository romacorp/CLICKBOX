<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'user_id', 'rating', 'comment'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    protected $validationRules = [
        'customer_id' => 'required|numeric',
        'user_id'     => 'required|numeric',
        'rating'      => 'required|numeric|greater_than[0]|less_than[6]',
        'comment'     => 'permit_empty|min_length[5]',
    ];

    public function getCustomerRatings($customerId)
    {
        return $this->select('ratings.*, users.username')
                    ->join('users', 'users.id = ratings.user_id')
                    ->where('customer_id', $customerId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
<?php

namespace App\Services;

use App\Models\RatingModel;

class RatingService
{
    protected $ratingModel;

    public function __construct()
    {
        $this->ratingModel = new RatingModel();
    }

    public function addRating($customerId, $userId, $rating, $comment)
    {
        $data = [
            'customer_id' => $customerId,
            'user_id'     => $userId,
            'rating'      => $rating,
            'comment'     => $comment
        ];

        return $this->ratingModel->save($data);
    }

    public function getCustomerRatings($customerId)
    {
        return $this->ratingModel->getCustomerRatings($customerId);
    }
}
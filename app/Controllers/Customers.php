<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Services\RatingService;
use CodeIgniter\Controller;

class Customers extends Controller
{
    protected $customerModel;
    protected $ratingService;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->ratingService = new RatingService();
    }

    public function search()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $identification = $this->request->getGet('identification');
        $customer = null;
        $ratings = [];

        if ($identification) {
            $customer = $this->customerModel->findByIdentification($identification);
            if ($customer) {
                $ratings = $this->ratingService->getCustomerRatings($customer['id']);
            }
        }

        return view('customers/search', [
            'customer' => $customer,
            'ratings' => $ratings
        ]);
    }

    public function rate()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['error' => 'Unauthorized'])->setStatusCode(401);
        }

        if ($this->request->getMethod() === 'post') {
            $result = $this->ratingService->addRating(
                $this->request->getPost('customer_id'),
                session()->get('user_id'),
                $this->request->getPost('rating'),
                $this->request->getPost('comment')
            );

            if ($result) {
                return $this->response->setJSON(['success' => true]);
            }

            return $this->response->setJSON(['error' => 'Failed to save rating'])->setStatusCode(400);
        }
    }
}
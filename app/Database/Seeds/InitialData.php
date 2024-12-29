<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialData extends Seeder
{
    public function run()
    {
        // Datos de ejemplo para clientes
        $customers = [
            [
                'identification_number' => 'ID123456',
                'first_name' => 'Juan',
                'last_name' => 'Pérez'
            ],
            [
                'identification_number' => 'ID789012',
                'first_name' => 'María',
                'last_name' => 'González'
            ]
        ];

        $this->db->table('customers')->insertBatch($customers);
    }
}
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use App\Validation\CustomerRules;

class Validation extends BaseConfig
{
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        CustomerRules::class,
    ];

    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $customerRules = [
        'identification' => [
            'rules' => 'required|min_length[5]|max_length[20]|validateIdentification',
            'errors' => [
                'validateIdentification' => 'El número de identificación no tiene un formato válido'
            ]
        ],
        'rating' => [
            'rules' => 'required|numeric|validateRating',
            'errors' => [
                'validateRating' => 'La calificación debe estar entre 1 y 5'
            ]
        ]
    ];
}
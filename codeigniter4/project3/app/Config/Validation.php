<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [\Myth\Auth\Authentication\Passwords\ValidationRules::class, # add
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $registration = [
        'username' => [
            'label' => 'Username',
            'rules' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'alpha_numeric_space' => '{field} hanya boleh berisi huruf, angka, dan spasi.',
                'min_length' => '{field} minimal {param} karakter.',
                'is_unique' => '{field} sudah digunakan.'
            ]
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'valid_email' => 'Format {field} tidak valid.',
                'is_unique' => '{field} sudah terdaftar.'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|strong_password',
            'errors' => [
                'required' => '{field} harus diisi.',
                'strong_password' => '{field} terlalu lemah.'
            ]
        ],
        'pass_confirm' => [
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'matches' => '{field} tidak cocok dengan password.'
            ]
        ],
    ];
}

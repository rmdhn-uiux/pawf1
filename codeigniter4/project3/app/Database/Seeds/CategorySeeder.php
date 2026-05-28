<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Technology',
                'slug' => 'technology'
            ],
            [
                'name' => 'Food',
                'slug' => 'food'
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle'
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel'
            ]
        ];

        // Using Query Builder
        $this->db->table('categories')->insertBatch($data);
    }
}

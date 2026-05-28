<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $this->db->table('categories')->insertBatch([
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Food', 'slug' => 'food'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle'],
        ]);
    }
}

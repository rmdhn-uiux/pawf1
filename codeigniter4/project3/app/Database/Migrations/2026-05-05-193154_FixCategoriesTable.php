<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixCategoriesTable extends Migration
{
    public function up()
    {
        // Check if description column exists before dropping
        if ($this->db->fieldExists('description', 'categories')) {
            $this->forge->dropColumn('categories', 'description');
        }
        
        // Check if updated_at column exists before dropping
        if ($this->db->fieldExists('updated_at', 'categories')) {
            $this->forge->dropColumn('categories', 'updated_at');
        }

        // Check if slug column exists before adding
        if (!$this->db->fieldExists('slug', 'categories')) {
            $this->forge->addColumn('categories', [
                'slug' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'unique'     => true,
                    'after'      => 'name',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('slug', 'categories')) {
            $this->forge->dropColumn('categories', 'slug');
        }
        
        $this->forge->addColumn('categories', [
            'description' => ['type' => 'TEXT', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCategoryAndImageToPosts extends Migration
{
    public function up()
    {
        if (!$this->db->fieldExists('category_id', 'posts')) {
            $this->forge->addColumn('posts', [
                'category_id' => [
                    'type'       => 'INT',
                    'constraint' => 5,
                    'unsigned'   => true,
                    'null'       => true,
                    'after'      => 'id',
                ],
            ]);
        }

        if (!$this->db->fieldExists('post_image', 'posts')) {
            $this->forge->addColumn('posts', [
                'post_image' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'content',
                ],
            ]);
        }

        // Add foreign key constraint if you want, but CI4 forge needs special handling for that
        // $this->db->query("ALTER TABLE posts ADD CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL");
    }

    public function down()
    {
        $this->forge->dropColumn('posts', ['category_id', 'post_image']);
    }
}

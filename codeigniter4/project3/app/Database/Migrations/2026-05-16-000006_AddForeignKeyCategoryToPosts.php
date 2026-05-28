<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyCategoryToPosts extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE posts ADD CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE posts DROP FOREIGN KEY fk_posts_category");
    }
}

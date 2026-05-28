<?php

namespace Tests\Support\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('posts')->insertBatch([
            [
                'title'       => 'Test Post 1',
                'slug'        => 'test-post-1',
                'content'     => 'Content for test post 1',
                'author'      => 'Admin',
                'status'      => 'published',
                'category_id' => 1,
            ],
            [
                'title'       => 'Test Post 2',
                'slug'        => 'test-post-2',
                'content'     => 'Content for test post 2',
                'author'      => 'Admin',
                'status'      => 'published',
                'category_id' => 2,
            ],
            [
                'title'       => 'Test Post 3',
                'slug'        => 'test-post-3',
                'content'     => 'Content for test post 3',
                'author'      => 'Admin',
                'status'      => 'draft',
                'category_id' => 1,
            ],
        ]);
    }
}

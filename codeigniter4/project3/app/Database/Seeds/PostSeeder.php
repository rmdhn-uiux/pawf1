<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $posts_data = [
        [
            'title' => 'Mulai Nyobain Codeigniter',
            'slug' => 'codeigniter-starter',
            'author' => 'John Doe',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua.',
            'status' => 'published',
            'category_id' => 1,
            'post_image' => null,
        ],
        [
            'title' => 'Cara Mudah Buat Hello World',
            'slug' => 'hello-world',
            'author' => 'Jane Smith',
            'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.',
            'status' => 'published',
            'category_id' => 1,
            'post_image' => null,
        ],
        [
            'title' => 'Meetup Komunitas Kelas Koding',
            'slug' => 'meetup-comunity',
            'author' => 'Ahmad',
            'content' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis voluptatum deleniti atque corrupti quos.',
            'status' => 'published',
            'category_id' => 3,
            'post_image' => null,
        ],
        [
            'title' => 'Draf Postingan Baru',
            'slug' => 'draft-post',
            'author' => 'Admin',
            'content' => 'Ini adalah konten draf yang tidak boleh muncul di halaman utama.',
            'status' => 'draft',
            'category_id' => 2,
            'post_image' => null,
        ]
        ];
        foreach($posts_data as $data){
        $this->db->table('posts')->insert($data);
        }
    }
}

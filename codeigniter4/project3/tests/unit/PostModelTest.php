<?php

use App\Models\PostModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\CategorySeeder;
use Tests\Support\Database\Seeds\PostSeeder;

/**
 * @internal
 */
final class PostModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $seed = PostSeeder::class;

    protected $migrate = true;

    protected function setUp(): void
    {
        parent::setUp();

        $seeder = \Config\Database::seeder();
        $seeder->call(CategorySeeder::class);
    }

    public function testFindPublishedPosts(): void
    {
        $model = new PostModel();
        $posts = $model->where('status', 'published')->findAll();

        $this->assertCount(2, $posts);
    }

    public function testFindDraftPosts(): void
    {
        $model = new PostModel();
        $posts = $model->where('status', 'draft')->findAll();

        $this->assertCount(1, $posts);
    }

    public function testFindBySlug(): void
    {
        $model = new PostModel();
        $post = $model->where('slug', 'test-post-1')->first();

        $this->assertNotNull($post);
        $this->assertEquals('Test Post 1', $post['title']);
    }

    public function testInsertPost(): void
    {
        $model = new PostModel();
        $id = $model->insert([
            'title'       => 'New Post',
            'slug'        => 'new-post',
            'content'     => 'New content',
            'author'      => 'Admin',
            'status'      => 'published',
            'category_id' => 1,
        ]);

        $this->assertIsInt($id);
        $this->assertNotNull($model->find($id));
    }
}

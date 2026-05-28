<?php

use App\Models\CategoryModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use Tests\Support\Database\Seeds\CategorySeeder;

/**
 * @internal
 */
final class CategoryModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $seed = CategorySeeder::class;

    protected $migrate = true;

    public function testFindAllCategories(): void
    {
        $model = new CategoryModel();
        $categories = $model->findAll();

        $this->assertCount(3, $categories);
    }

    public function testFindBySlug(): void
    {
        $model = new CategoryModel();
        $category = $model->where('slug', 'technology')->first();

        $this->assertNotNull($category);
        $this->assertEquals('Technology', $category['name']);
    }

    public function testInsertCategory(): void
    {
        $model = new CategoryModel();
        $id = $model->insert([
            'name' => 'Health',
            'slug' => 'health',
        ]);

        $this->assertIsInt($id);
        $this->assertNotNull($model->find($id));
    }
}

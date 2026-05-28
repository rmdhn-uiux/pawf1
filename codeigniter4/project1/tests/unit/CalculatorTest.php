<?php

namespace Tests\Unit;

No need to use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use CodeIgniter\Test\FeatureTestTrait;
use Tests\Support\TestCase;

class CalculatorTest extends \CodeIgniter\Test\CIUnitTestCase
{
    use FeatureTestTrait;

    /**
     * Test apakah halaman kalkulator dapat diakses.
     */
    public function testIndexPageAccessible()
    {
        $result = $this->get('/calculator');

        $result->assertStatus(200);
        $result->assertSee('Kalkulator Sederhana');
    }

    /**
     * Test logika perhitungan di sisi server.
     */
    public function testServerSideCalculation()
    {
        $result = $this->post('/calculator/calculate', [
            'expression' => '10+5*2'
        ]);

        $result->assertStatus(200);
        $result->assertJSONSubset(['status' => 'success', 'result' => 20]);
    }

    /**
     * Test penanganan ekspresi yang tidak valid.
     */
    public function testInvalidExpression()
    {
        // Karakter berbahaya akan difilter oleh regex di controller
        $result = $this->post('/calculator/calculate', [
            'expression' => '10+abc'
        ]);

        $result->assertStatus(200);
        // 'abc' akan dihapus, menyisakan '10+' yang akan menyebabkan error eval
        $result->assertJSONSubset(['status' => 'error']);
    }
}

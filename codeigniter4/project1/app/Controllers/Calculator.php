<?php

namespace App\Controllers;

/**
 * Controller untuk aplikasi Kalkulator.
 * Menangani tampilan halaman dan logika perhitungan (jika diperlukan di sisi server).
 */
class Calculator extends BaseController
{
    /**
     * Menampilkan view utama kalkulator.
     * 
     * @return string
     */
    public function index(): string
    {
        return view('calculator');
    }

    /**
     * Menangani permintaan perhitungan melalui AJAX (Opsional).
     * Ini menunjukkan penggunaan PHP untuk memproses data.
     */
    public function calculate()
    {
        $expression = $this->request->getPost('expression');
        
        // Membersihkan input untuk keamanan
        $expression = preg_replace('/[^0-9+\-*\/.]/', '', $expression);
        
        try {
            // Menggunakan fungsi evaluasi matematika di PHP (Contoh sederhana)
            // Catatan: eval() di PHP sangat berbahaya jika tidak difilter ketat.
            // Di sini kita hanya melakukan filter regex dasar.
            $result = 0;
            if (!empty($expression)) {
                // Perhitungan sederhana menggunakan eval (Hanya untuk demonstrasi)
                // Di aplikasi produksi, gunakan library math parser yang aman.
                $result = eval("return $expression;");
            }
            
            return $this->response->setJSON(['status' => 'success', 'result' => $result]);
        } catch (\Throwable $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Expression']);
        }
    }
}

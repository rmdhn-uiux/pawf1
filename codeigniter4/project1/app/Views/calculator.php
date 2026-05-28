<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana - CodeIgniter 4</title>
    <!-- CSS dihubungkan dari public/assets/css/calculator.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/calculator.css') ?>">
</head>
<body>
    <!-- Kontainer utama kalkulator -->
    <div class="calculator">
        <!-- Tampilan input untuk hasil dan input angka -->
        <input type="text" id="display" disabled placeholder="0">
        
        <!-- Grid tombol-tombol kalkulator -->
        <div class="buttons">
            <!-- Baris 1: Kontrol dan Operator Dasar -->
            <button onclick="clearDisplay()" title="Clear">C</button>
            <button onclick="deleteLast()" title="Delete">DEL</button>
            <button onclick="appendValue('/')">/</button>
            <button onclick="appendValue('*')">*</button>
            
            <!-- Baris 2: Angka 7, 8, 9 dan Kurang -->
            <button onclick="appendValue('7')">7</button>
            <button onclick="appendValue('8')">8</button>
            <button onclick="appendValue('9')">9</button>
            <button onclick="appendValue('-')">-</button>
            
            <!-- Baris 3: Angka 4, 5, 6 dan Tambah -->
            <button onclick="appendValue('4')">4</button>
            <button onclick="appendValue('5')">5</button>
            <button onclick="appendValue('6')">6</button>
            <button onclick="appendValue('+')">+</button>
            
            <!-- Baris 4: Angka 1, 2, 3 dan Titik Desimal -->
            <button onclick="appendValue('1')">1</button>
            <button onclick="appendValue('2')">2</button>
            <button onclick="appendValue('3')">3</button>
            <button onclick="appendValue('.')">.</button>
            
            <!-- Baris 5: Angka 0 dan Tombol Sama Dengan -->
            <button onclick="appendValue('0')" style="grid-column: span 2;">0</button>
            <button onclick="calculate()" class="btn-equal">=</button>
        </div>
    </div>

    <!-- JavaScript dihubungkan dari public/assets/js/calculator.js -->
    <script src="<?= base_url('assets/js/calculator.js') ?>"></script>
</body>
</html>

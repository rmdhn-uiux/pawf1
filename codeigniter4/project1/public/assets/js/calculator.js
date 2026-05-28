/**
 * Menghapus isi tampilan kalkulator.
 * Membersihkan semua karakter di input display.
 */
function clearDisplay() {
    document.getElementById("display").value = "";
}

/**
 * Menghapus satu karakter terakhir dari tampilan.
 * Digunakan untuk tombol 'DEL'.
 */
function deleteLast() {
    let display = document.getElementById("display");
    display.value = display.value.slice(0, -1);
}

/**
 * Menambahkan angka atau operator ke dalam tampilan.
 * @param {string} value - Karakter yang akan ditambahkan.
 */
function appendValue(value) {
    let display = document.getElementById("display");
    let current = display.value;
    
    // Mencegah operator ganda di awal (kecuali minus)
    if (current === "" && isNaN(value) && value !== '-') {
        return;
    }

    // Mencegah operator berurutan (misal: ++, +*, dll)
    let lastChar = current.slice(-1);
    if (isNaN(lastChar) && isNaN(value) && lastChar !== "." && value !== ".") {
        display.value = current.slice(0, -1) + value;
        return;
    }

    // Mencegah multiple decimal point dalam satu angka
    if (value === ".") {
        let parts = current.split(/[\+\-\*\/]/);
        let lastPart = parts[parts.length - 1];
        if (lastPart.includes(".")) {
            return;
        }
    }
    
    display.value += value;
}

/**
 * Melakukan perhitungan matematika berdasarkan input yang ada.
 * Menggunakan fungsi eval() dengan penanganan kesalahan sederhana.
 */
function calculate() {
    let display = document.getElementById("display");
    if (display.value === "") return;
    
    try {
        // Evaluasi ekspresi matematika
        let result = eval(display.value);
        
        // Menangani presisi angka desimal (misal: 0.1 + 0.2)
        if (!Number.isInteger(result)) {
            result = Math.round(result * 100000000) / 100000000;
        }
        
        display.value = result;
    } catch (e) {
        // Menampilkan 'Error' jika format salah
        display.value = "Error";
    }
}

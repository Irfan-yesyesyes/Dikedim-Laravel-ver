document.addEventListener('DOMContentLoaded', () => {
    console.log('✅ JavaScript DiKeDim Aktif');

    // 1. Konfirmasi Hapus Barang
    const deleteForms = document.querySelectorAll('.form-delete');
    deleteForms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const confirmDelete = confirm('Apakah Anda yakin ingin menghapus data barang ini?');
            if (!confirmDelete) {
                e.preventDefault(); // Membatalkan pengiriman form jika user klik Batal
            }
        });
    });

    // 2. Fungsi Toast (Pesan Muncul)
    const toastElement = document.getElementById('toast');
    window.showToast = (message, type = 'success') => {
        if (!toastElement) return;

        toastElement.textContent = message;
        toastElement.classList.add('show');

        // Warna berdasarkan tipe
        if (type === 'danger') toastElement.style.background = '#ef4444';
        else toastElement.style.background = '#021A54';

        setTimeout(() => {
            toastElement.classList.remove('show');
        }, 3000);
    };

    // 3. Animasi angka stok rendah (Opsional)
    const stokCells = document.querySelectorAll('.stok-value');
    stokCells.forEach(cell => {
        const val = parseInt(cell.textContent);
        if (val <= 5) {
            cell.style.color = '#ef4444';
            cell.style.fontWeight = 'bold';
        }
    });
});

// Main app entry point
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    console.log('✅ JavaScript DiKeDim Aktif');

    // 1. AJAX Delete Barang
    const deleteButtons = document.querySelectorAll('.btn-delete-ajax');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const barangId = this.getAttribute('data-barang-id');
            const barangNama = this.getAttribute('data-barang-nama');
            const route = this.getAttribute('data-route');

            if (!confirm(`Apakah Anda yakin ingin menghapus "${barangNama}"?`)) {
                return;
            }

            // Show loading state
            this.disabled = true;
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="bi bi-hourglass-split text-sm animate-spin"></i>';

            // AJAX Request
            fetch(route, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Show success toast
                    showToast(data.message, 'success');

                    // Remove the row from table with fade effect
                    const row = this.closest('tr');
                    row.style.opacity = '0';
                    row.style.transition = 'opacity 0.3s ease';

                    setTimeout(() => {
                        row.remove();
                        // Reload page if no more items
                        const tableBody = document.querySelector('tbody');
                        if (tableBody.children.length === 0) {
                            location.reload();
                        }
                    }, 300);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Gagal menghapus barang!', 'danger');
                this.disabled = false;
                this.innerHTML = originalHTML;
            });
        });
    });

    // 2. Konfirmasi Hapus Barang (untuk form tradisional - backup)
    const deleteForms = document.querySelectorAll('.form-delete');
    deleteForms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const confirmDelete = confirm('Apakah Anda yakin ingin menghapus data barang ini?');
            if (!confirmDelete) {
                e.preventDefault();
            }
        });
    });

    // 3. Fungsi Toast (Pesan Muncul)
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

    // 4. Animasi angka stok rendah
    const stokCells = document.querySelectorAll('.stok-value');
    stokCells.forEach(cell => {
        const val = parseInt(cell.textContent);
        if (val <= 5) {
            cell.style.color = '#ef4444';
            cell.style.fontWeight = 'bold';
        }
    });

    // 5. Image Preview Handler (Fallback untuk Alpine.js)
    const fotoInputs = document.querySelectorAll('input[name="foto"]');
    fotoInputs.forEach(fileInput => {
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Validasi tipe file
                if (!file.type.match('image/.*')) {
                    alert('File harus berupa gambar (JPG, PNG, atau WebP)');
                    this.value = '';
                    return;
                }

                // Validasi ukuran file
                if (file.size > 2048 * 1024) { // 2MB
                    alert('Ukuran file tidak boleh lebih dari 2MB');
                    this.value = '';
                    return;
                }

                // Buat preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    // Find preview image in form
                    const form = fileInput.closest('form');
                    if (form) {
                        const previewImg = form.querySelector('img[alt="Preview"]');
                        if (previewImg) {
                            previewImg.src = e.target.result;
                            previewImg.style.display = 'block';
                        }
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });
});


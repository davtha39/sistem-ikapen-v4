<script>
    function showDeleteConfirmation() {
        Swal.fire({
            title: 'Konfirmasi Penghapusan Pengumuman',
            text: "Apakah anda yakin ingin menghapus pengumuman ini? tindakan ini tidak dapat dibatalkan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // if the user confirms the deletion, submit the form
                document.querySelector('form').submit();
            }
        });
    }
</script>
$(document).ready(function() {
// Memeriksa apakah ada pesan success
var successMessage = $('body').data('success-message');
var errorMessage = $('body').data('error-message');

 // Jika ada pesan sukses
 if (successMessage) {
    Swal.fire({
        title: 'Berhasil!',
        text: successMessage,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

    // Jika ada pesan error
    if (errorMessage) {
        Swal.fire({
            title: 'Gagal!',
            text: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }

});
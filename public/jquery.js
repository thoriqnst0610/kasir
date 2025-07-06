

let nilai = 0;

function inputGambar() {
    // Membuat elemen-elemen baru

    nilai++;
    const idCol8 = 'idCol8' + nilai;
    const idCol2 = 'idCol2' + nilai;

    const col8 = $('<div>').attr('id', idCol8).addClass('col-8 mt-1');
    // const formgroup = $('<div>').attr('id', 'inputBaru').addClass('form-group');
    const col2 = $('<div>').attr('id', idCol2).addClass('col-2 mt-1');

    // Membuat elemen input file
    const inputGambar = $('<input>').attr({
        type: 'file',
        id: 'gambarProduk' + nilai,
        name: 'gambarProduk' + nilai,
        required: true 
    }).addClass('form-control');

    // Membuat tombol hapus
    const tombolHapus = $('<button>').attr({
        type: 'button',
        onclick: `hapusInputGambar('${idCol8}', '${idCol2}')`
    }).addClass('btn btn-danger').text('Hapus');

    // // Membuat container untuk input dan tombol hapus
    // const inputContainer = $('<div>').addClass('input-container');
    col8.append(inputGambar);
    col2.append(tombolHapus);

    // // Menambahkan elemen-elemen ke dalam struktur yang benar
    // col8.append(formgroup); // Menambahkan formgroup ke col8
    // formgroup.append(inputContainer); // Menambahkan inputContainer ke formgroup
    $('#indukForm').append(col8); // Menambahkan col8 ke dalam induk form
    $('#indukForm').append(col2); // Menambahkan col2 ke dalam induk form
}

function hapusInputGambar(elementDiv1, elementDiv2) {

    $(`#${elementDiv1}`).remove();
    $(`#${elementDiv2}`).remove();

}

function tambahProduk() {
    // Fungsi untuk mengambil data kategori
    function ambilKategori() {
        $.ajax({
            url: '/ambil',  // URL endpoint yang akan diakses
            type: 'GET',  // HTTP method
            dataType: 'json',  // Format data yang diterima
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Menambahkan CSRF Token di header
            },
            success: function(data) {
                // Menemukan elemen select dengan ID "seleksi"
                const selectElement = $('#seleksi');

                // Membersihkan elemen select terlebih dahulu
                selectElement.empty();

                // Menambahkan option pertama (placeholder)
                // selectElement.append('<option value="" disabled selected>Pilih Kategori</option>');

                // Looping data kategori yang diterima dan menambahkannya sebagai option
                data.forEach(function(element) {
                    // Asumsikan element memiliki properti 'id' dan 'kategori'
                    selectElement.append(
                        `<option value="${element.namaKategori}">${element.namaKategori}</option>`
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat mengambil data:', error);
            }
        });
    };

    // Panggil fungsi ambilKategori untuk mengambil data kategori
    ambilKategori();
}


function tampilkan() {
    // Fungsi untuk mengambil data kategori
    function ambilKategori() {
        $.ajax({
            url: '/ambil',  // URL endpoint yang akan diakses
            type: 'GET',  // HTTP method
            dataType: 'json',  // Format data yang diterima
            success: function(data) {
                // Menemukan elemen select dengan ID "seleksi"
                const selectElement = $('#seleksi1');

                // Membersihkan elemen select terlebih dahulu
                selectElement.empty();

                // Menambahkan option pertama (placeholder)
                // selectElement.append('<option value="" disabled selected>Pilih Kategori</option>');

                // Looping data kategori yang diterima dan menambahkannya sebagai option
                data.forEach(function(element) {
                    // Asumsikan element memiliki properti 'id' dan 'kategori'
                    selectElement.append(
                        `<option value="${element.namaKategori}">${element.namaKategori}</option>`
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat mengambil data:', error);
            }
        });
    };

    // Panggil fungsi ambilKategori untuk mengambil data kategori
    ambilKategori();
}

tampilkan();
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Akun</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <form action="/editAkun" method="post">
                    <?php csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="hidden" name="idAdmin" value="<?= esc($data['idAdmin']) ?>">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($data['nama']) ?>" readonly  required>
                        <div id="nama" class="form-text">Silahkan isi sesuai dengan yang di inginkan</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= esc($data['email']) ?>" readonly  required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="kosongkan jika tidak ingin diubah">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a class="btn btn-danger" data-toggle="modal"
                    data-target="#tambahAdmin">Tambah Admin</a>
                </form>
                
            </div>
            <div class="col-md-6 mt-2 col-xl-4">
                <img class="img-fluid w-50" src="<?= base_url('gambarAkun/gambarAkun.jpg'); ?>" alt="profil">
            </div>
        </div>


        <!-- modal menambah Kategori Produk -->
        <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="tambahModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Menambah Admin Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/register" method="post">
                            <?php csrf_field(); ?>
                            <div id="indukForm" class="row">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"  required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="" name="nama"  required>
                                </div>

                                <div class="mb-3">
                                    <label for="inputPassword">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  required>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Akhir  Menambah Kategori Produk -->

    </div>
</div>

</div>
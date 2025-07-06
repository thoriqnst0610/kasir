<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Meja</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- modal menambah Kategori Produk -->
    <!-- Modal -->
    <div class="modal fade" id="tambahMeja" tabindex="-1" aria-labelledby="tambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Menambah Data Meja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="/tambahMeja" method="post">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <label for="namaKategori">Nomor Meja</label>
                            <input type="text" class="form-control" id="nomorMeja"
                                aria-describedby="textHelp" name="nomorMeja"  required>
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
    <!-- akhir Menambah Kategori Produk -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#tambahMeja">
                Tambah Meja<i class="bi bi-plus-lg"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Meja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No Meja</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                     <tbody>

                        <?php
                        $no = 1;

                        foreach ($data as $meja) { ?>


                            <tr>
                                <td><?= esc($meja['noMeja']) ?></td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $no; ?>">
                                        Edit
                                    </button>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $no; ?>">
                                        Hapus
                                    </button>


                                </td>
                            </tr>


                            <div class="modal fade" id="edit<?= $no; ?>" tabindex="-1" aria-labelledby="tambahModalLabelEdit"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabelEdit">Mengedit Data Meja</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/editMeja" method="post">
                                                <?php csrf_field(); ?>
                                                <div class="form-group">
                                                    <label for="namaMeja">No Meja</label>
                                                    <input type="hidden" name="idMeja" value="<?= esc($meja['idMeja']) ?>">
                                                    <input type="text" class="form-control" id="namaMeja"
                                                        aria-describedby="textHelp" name="nomorMeja" value="<?= esc($meja['noMeja']) ?>"  required>
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



                            <!-- modal meghapus -->
                            <div class="modal fade" id="hapus<?= $no; ?>" tabindex="-1" role="dialog"
                                aria-labelledby="hapustersediaLabelEdit" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapustersediaLabelEdit">Konfirmasi Hapus </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus <span class=""><?= esc($meja['noMeja']) ?></span>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/hapusMeja" method="post">
                                                <?php csrf_field(); ?>
                                                <input type="hidden" name="idMeja" id="idMeja" value="<?= esc($meja['idMeja']) ?>">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" id="confirmDeleteProduk" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal akhir menghapus -->


                        <?php
                        $no++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Menu</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- modal menambah Kategori Produk -->
    <!-- Modal -->
    <div class="modal fade" id="tambahMenu" tabindex="-1" aria-labelledby="tambahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Menambah Data Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tambahMenu" method="post" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <div class="form-group">
                            <label for="namaKategori">Nama Menu</label>
                            <input type="text" class="form-control" id="nomorMeja"
                                aria-describedby="textHelp" name="namaMenu" required>
                        </div>
                        <div class="form-group">
                            <label for="namaKategori">Harga</label>
                            <input type="number" class="form-control" id="nomorMeja"
                                aria-describedby="textHelp" name="hargaMenu" required>
                        </div>
                        <div class="form-group">
                            <label for="namaKategori">kategori</label>
                            <input type="text" class="form-control" id="nomorMeja"
                                aria-describedby="textHelp" name="kategoriMenu" required>
                        </div>
                        <div class="form-group">
                            <label for="namaKategori">Gambar Menu</label>
                            <input type="file" class="form-control" id="nomorMeja"
                                aria-describedby="textHelp" name="gambarMenu" required>
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
                data-target="#tambahMenu">
                Tambah Menu<i class="bi bi-plus-lg"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        $no = 1;

                        foreach ($data as $menu) { ?>


                            <tr>
                                <td><?= esc($menu['namaMenu']) ?></td>
                                <td><?= esc($menu['hargaMenu']) ?></td>
                                <td><?= esc($menu['kategoriMenu']) ?></td>
                                <td><img src="<?php echo base_url('gambarMenu/'.esc($menu['gambarMenu'])); ?>" alt="gambarMenu" style="width: 50px; height:50px;"></td>
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
                                            <h5 class="modal-title" id="tambahModalLabelEdit">Mengedit Data Menu</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/editMenu" method="post" enctype="multipart/form-data">
                                                <?php csrf_field(); ?>
                                                <div class="form-group">
                                                    <label for="namaMeja">Nama Menu</label>
                                                    <input type="hidden" name="idMenu" value="<?= esc($menu['idMenu']) ?>">
                                                    <input type="text" class="form-control" id="namaMeja"
                                                        aria-describedby="textHelp" name="namaMenu" value="<?= esc($menu['namaMenu']) ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="namaMeja">Harga</label>
                                                    <input type="number" class="form-control" id="namaMeja"
                                                        aria-describedby="textHelp" name="hargaMenu" value="<?= esc($menu['hargaMenu']) ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="namaMeja">Kategori</label>
                                                    <input type="text" class="form-control" id="namaMeja"
                                                        aria-describedby="textHelp" name="kategoriMenu" value="<?= esc($menu['kategoriMenu']) ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="namaMeja">Gambar Menu</label>
                                                    <input type="hidden" class="form-control" id="namaMeja"
                                                        aria-describedby="textHelp" name="gambarMenuLama" value="<?= esc($menu['gambarMenu']) ?>" required>
                                                        <input type="file" class="form-control" id="namaMeja"
                                                        aria-describedby="textHelp" name="gambarMenuBaru"  required>
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
                                            Apakah Anda yakin ingin menghapus <span class=""><?= esc($menu['namaMenu']) ?></span>?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/hapusMenu" method="post">
                                                <?php csrf_field(); ?>
                                                <input type="hidden" name="idMenu" id="idMenu" value="<?= esc($menu['idMenu']) ?>">
                                                <input type="hidden" name="gambarMenu" id="gambarMenu" value="<?= esc($menu['gambarMenu']) ?>">
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
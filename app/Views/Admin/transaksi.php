<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Pemesanan</h1>
        <a href="/pesanan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Lihat Pesanan</a>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

            <?php
                        $no = 1;

                        foreach ($data as $menu) { ?>
      
      <!-- Menu 1 -->
      <div class="col">
        <div class="card h-100">
          <img src="<?php echo base_url('gambarMenu/'.esc($menu['gambarMenu'])); ?>" class="card-img-top menu-image" alt="gambar-menu">
          <div class="card-body">
            <h5 class="card-title"><?= esc($menu['namaMenu']) ?></h5>
            <p class="card-text text-muted"><?= esc($menu['hargaMenu']) ?></p>
            <form action="/tambahPesanan" method="post">
            <div class="mb-3">
              <label for="qty1" class="form-label">Jumlah Pesanan:</label>
              <input type="number" class="form-control" name="jumlah" id="qty1" min="1" value="1">
              <input type="hidden" class="form-control" name="hargaMenu" value="<?= esc($menu['hargaMenu']) ?>">
              <input type="hidden" class="form-control" name="namaMenu" value="<?= esc($menu['namaMenu']) ?>">
            </div>
            <button type="submit" class="btn btn-primary w-100">Pesan</button>
            </form>
          </div>
        </div>
      </div>

      <?php
                            $no++;
                        }
                        ?>

    </div>


    </div>

</div>
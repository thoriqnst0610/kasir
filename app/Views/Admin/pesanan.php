<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <form action="/cetakPesanan" method="post">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>
      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Cetak Pesanan</button>
    </div>


    <table class="table table-bordered">
      <thead class="table-secondary">
        <tr>
          <th>No</th>
          <th>Pesanan</th>
          <th>Harga</th>
          <th>Jumlah Pesanan</th>
        </tr>
      </thead>
      <tbody>

        <?php

        function angkaKeRupiah($angka, $denganSimbol = true)
        {
          // Format angka ke format ribuan
          $hasil = number_format($angka, 0, ',', '.');

          // Tambahkan simbol "Rp" jika diminta
          if ($denganSimbol) {
            return 'Rp' . ' ' . $hasil;
          } else {
            return $hasil;
          }
        }

        $no = 1;

        $totalBayar = 0;

        foreach ($data as $menu) {

          $pesanan = $menu['hargaMenu'] * $menu['jumlah'];
          $totalBayar +=$pesanan;

        ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $menu['namaMenu'] ?></td>
            <td><?= $menu['hargaMenu'] ?></td>
            <td><?= $menu['jumlah'] ?></td>
          </tr>

        <?php } ?>

      </tbody>
    </table>

    <div class="row mb-3">
      <div class="col-md-6">
        <strong>No Meja:</strong>
        <select name="nomorMeja" class="form-control">
          <option value="">-Pilih Meja-</option>

          <?php

          foreach ($meja as $mejaMenu) {

          ?>

            <option value="<?= $mejaMenu['noMeja'] ?>">no <?= $mejaMenu['noMeja'] ?></option>

          <?php } ?>

        </select>
      </div>
      <div class="col-md-6 text-end">
        <strong>Total Bayar:</strong> <?php echo isset($totalBayar) ? angkaKeRupiah($totalBayar) : 'Rp 0'; ?>
        <input type="hidden" name="total" value="<?php echo isset($totalBayar) ? angkaKeRupiah($totalBayar) : 'Rp 0'; ?>">
      </div>
    </div>

    <div class="alert alert-info">
      <strong>Catatan:</strong> Semua pesanan akan disiapkan dalam waktu 15-20 menit. Terima kasih telah memesan!
    </div>

    <a href="/transaksi" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Pesanan</a>
    <a href="/transaksiBaru" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Buat Pesanan Baru</a>
  </form>

</div>

</div>
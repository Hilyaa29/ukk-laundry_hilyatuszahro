<h1>Laporan Laundry</h1>

<table class="table table-bordered" border="1" cellspacing="0" cellpadding="10">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Nama Paket</th>
      <th>Outlet</th>
      <th>Harga</th>
      <th>Terjual</th>
			<th>Pendapatan</th>
    </tr>	
  </thead>
    <tbody>
        <?php $total = 0 ?>
        <?php $index=1; foreach ($laporan as $row): ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?= $row['tgl'] ?></td>
                <td><?= $row['nama_paket'] ?></td>
                <td><?= $row['nama_outlet'] ?></td>
                <td><?= "Rp." . number_format($row['harga']) ?></td>
                <td><?= $row['terjual'] ?></td>
                <td><?= "Rp." . number_format($row['pendapatan']) ?></td>
            </tr>
            <?php $total += $row['pendapatan'] ?>
        <?php endforeach ?>	
        <tr>
          <td colspan="6"></td>
          <td>Total : <?= "Rp. " . number_format($total) ?></td>
        </tr>
    </tbody>
</table>
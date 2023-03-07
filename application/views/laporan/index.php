<div class="card">
  <h5 class="card-header"><?= $title ?></h5>
  <div class="card-body">
		<!-- <form action="<?= base_url('laporan/pdf') ?>"> -->
		<form>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="dari">Dari</label>
						<input type="date" name="dari" id="dari" class="form-control">
					</div>
					<div class="form-group">
						<label for="sampai">Sampai</label>
						<input type="date" name="sampai" id="sampai" class="form-control">
					</div>
					<div class="form-group">
						<label for="id_paket">Paket</label>
						<select name="id_paket" id="id_paket" class="form-control">
							<option value="">Semua paket</option>
							<?php foreach ($paket as $row): ?>
								<option value="<?= $row['id_paket'] ?>"><?= $row['nama_paket'] ?></option>
								<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_outlet">Outlet</label>
						<select name="id_outlet" id="id_outlet" class="form-control">
							<option value="">Semua Outlet</option>
							<?php foreach ($outlet as $row): ?>
								<option value="<?= $row['id_outlet'] ?>"><?= $row['nama'] ?></option>
								<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label for="id_member">Member</label>
						<select name="id_member" id="id_member" class="form-control">
							<option value="">Semua Member</option>
							<?php foreach ($member as $row): ?>
								<option value="<?= $row['id_member'] ?>"><?= $row['nama'] ?></option>
								<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
                          <label for="">Status Pembayaran</label>
                          <select name="dibayar" id="dibayar" class="form-control">
                             <option value="dibayar">dibayar</option>
                             <option value="belum_dibayar">belum_dibayar</option>
                          </select>
                        </div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-fw">Submit</button>
					</div>
				</div>
			</div>
		</form>
		<hr>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Tanggal</th>
	  <th>Nama Pelanggan</th>
      <th>Nama Paket</th>
      <th>Outlet</th>
      <th>Harga</th>
	  <th>Jumlah</th>
	  <th>Total</th>
	  <th>Status Pembayaran</th>
      <th>Pembayaran</th>
    </tr>	
  </thead>
			<tbody>
				<?php $index=1; foreach ($laporan as $row): ?>
					<tr>
						<td class="text-center"><?= $index++ ?></td>
						<td class="text-center"><?= $row['tgl'] ?></td>
						<td class="text-center"><?= $row['nama_pelanggan'] ?></td>
						<td class="text-center"><?= $row['nama_paket'] ?></td>
						<td class="text-center"><?= $row['nama_outlet'] ?></td>
						<td class="text-center"><?= "Rp. " . number_format($row['harga'], 0, '.', '.') ?></td>
						<td class="text-center"><?= $row['jumlah'] ?></td>
						<td class="text-center"><?= "Rp. " . number_format($row['total'], 0, '.', '.') ?></td>
						<td class="text-center"><?= $row['dibayar'] ?></td>
						<td>
							<?php if($row['dibayar'] == "Dibayar") { ?>
								<?php echo "Rp. " . number_format($row['total'], 0, '.', '.') ?>
							<?php } else { ?>
								<?php echo "Rp. " . number_format($row['harga'] * 0, 0, '.', '.') ?>
							<?php } ?>
						</td>

								
				<?php endforeach ?>	
			</tbody>
		</table>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="">
<form class="form" action="<?= base_url('admin/creatsiswa'); ?>" method="post">
			<div class="">
				<label for="nama" style="color: white">NIM :</label>
				<input style="color: blue" class="form-control" type="text" name="nim" id="nim" placeholder="nim" required>
			</div>
			<div class="form-group">
				<label for="email" style="color: white">Nama :</label>
				<input style="color: blue" class="form-control" type="text" name="nama" id="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
				<label for="nama" style="color: white">Agama:</label>
				<input style="color: white" class="form-control" type="text" name="agama" id="agama" placeholder="agama" required>
			</div>
            <div class="form-group">
				<label for="nama" style="color: white">tanggal Lahir:</label>
				<input style="color: white" type="date" name="tanggal_lahir" id="tgl_lahir" placeholder="tanggal Lahir" required>
			</div>
			<div class="form-group">
				<label for="email" style="color: white">Alamat:</label>
				<input style="color: white" class="form-control" type="text" name="alamat" id="password" placeholder="Alamat" required>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="">
				<a href="index.php" class="btn btn-success" style="">Kembali</a>
            </div>

        </form>
        </div>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
<form class="form" action="<?= base_url('admin/info'); ?>" method="post">
			<div class="">
				<label for="nama" style="color: white">Nama Info :</label>
				<input style="color: blue" class="form-control" type="text" name="nama_info" id="username" placeholder="username" required>
			</div>
			<div class="form-group">
				<label for="email" style="color: white">Informasi</label>
				<input style="color: white" class="form-control" type="text" name="info" id="password" placeholder="text" required>
            </div>
            <div class="form-group">
				<label for="nama" style="color: white">Gambar</label>
				<input style="color: black" class="form-control" type="file" name="gambar" id="username" placeholder="Foto" required>
			</div>
            <div class="form-group">
				<label for="nama" style="color: white">Tanggal Update</label>
				<input style="color: white" type="date" name="tgl" id="tgl_lahir" placeholder="tanggal Lahir" required>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="">
				<a href="index.php" class="btn btn-success" style="">Kembali</a>
            </div>
            

        </form>
        </div>
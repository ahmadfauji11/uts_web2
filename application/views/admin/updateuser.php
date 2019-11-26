<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
<?=foreach($user as $u) ?>
<form class="form" action="<?= base_url('admin/update'); ?>" method="post">
			<div class="">
				<label for="nama" style="color: white">username :</label>
				<input style="color: blue" class="form-control" type="text" value="<?= $u->username; ?>" name="username" id="username" placeholder="username" required>
			</div>
            <div class="form-group">
				<label for="nama" style="color: white">Nama Lengkap:</label>
				<input style="color: white" class="form-control" value="<?= $u->>nama; ?>" type="text" name="nama" id="username" placeholder="Nama Lengkap" required>
			</div>
			<div class="form-group">
				<label for="email" style="color: white">email:</label>
				<input style="color: white" class="form-control" value="<?= $u->email; ?>" type="email" name="email" id="password" placeholder="email" required>
            </div>
            <div class="form-group">
				<label for="nama" style="color: white">tanggal Lahir:</label>
				<input style="color: white" type="date" value="<?= $u->tgl_lahir; ?>" name="tgl_lahir" id="tgl_lahir" placeholder="tanggal Lahir" required>
			</div>
			<div class="form-group">
				<label for="email" style="color: white">Alamat:</label>
				<input style="color: white" class="form-control" type="text" value="<?= $u->alamat; ?>" name="alamat" id="password" placeholder="Alamat" required>
			</div>
			<div class="form-group">
				<label style="color: white" for="kelas">Status :</label>
				<select style="color: white" value="<?= $u->status; ?>"  id="kelas" name="status" required>
					<option value="">Pilih Status</option>
					<option value="Wali kelas">Wali Kelas</option>
					<option value="Guru">Guru</option>
                    <option value="Admin">Admin</option>
                    <option value="Guru BK">Guru BK</option>
                    <option value="Siswa">Siswa</option>
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Submit" class="btn btn-primary" style="">
				<a href="index.php" class="btn btn-success" style="">Kembali</a>
            </div>

        </form>
        </div>
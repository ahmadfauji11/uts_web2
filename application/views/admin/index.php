<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
			<form>
					<div class="login100-form-avatar">
						<img src="images/avatar-01.jpg" alt="">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						ADMIN
					</span>

				</form>
				<form action="<?= base_url('login/aksi_login'); ?>" metode="post">
				<div class="wrap-input100 validate-input m-b-10">
				<input class="input100" type="text" name="username" placeholder="Username">
					<input class="input100" type="password" name="password" placeholder="Password">
					<button class="login100-form-btn" type="submit" name="login" value="login">
							Login
						</button>
				</div>	

					<div class="text-center w-full p-t-25 p-b-230">
						<a href="#" class="txt1">
							Forgot Username / Password?
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
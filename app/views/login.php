<?php $this->view("header",$data); ?>

<div class="cotainer">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Login</div>
				<div class="card-body">
					<form method="post">
						<div class="form-group row">
							<span class="col-md-6 offset-md-4" style="font-size:18px; color:red;"><?php check_error() ?></span>
						</div>
						<div class="form-group row">
							<label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '';?>" required autofocus/>
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '';?>" required/>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember_me" id="remember_me" <?php if(isset($_COOKIE["email"])) { ?> checked<?php } ?>> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="col-md-6 offset-md-4">
							<button type="submit" class="btn btn-primary">
								Login
							</button>
							<a href="<?=ROOT?>signup" class="btn btn-link">
								Dont have an account? Signup here
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	
<?php $this->view("footer",$data); ?>

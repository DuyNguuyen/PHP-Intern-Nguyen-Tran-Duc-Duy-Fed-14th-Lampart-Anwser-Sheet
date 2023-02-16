<?php $this->view("header",$data); ?>

<div class="cotainer">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">Register</div>
					<div class="card-body">
						<form method="post">
							<div class="form-group row">
								<span class="col-md-6 offset-md-4" style="font-size:18px; color:red;"><?php check_error() ?></span>
							</div>
							<div class="form-group row">
								<label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '';?>"/>
								</div>
							</div>

							<div class="form-group row">
								<label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '';?>"/>
									<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password"/>
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">Confirm password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password2"/>
								</div>
							</div>

							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
								Register
								</button>
							</div>
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>
</div>
 
<?php $this->view("footer",$data); ?>

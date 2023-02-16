<?php $this->view("header",$data); ?>
<div class="cotainer">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">Edit Profile</div>
					<div class="card-body">
						<form method="post">
							<div class="form-group row">
								<span class="col-md-6 offset-md-4" style="font-size:18px; color:red;"><?php check_error() ?></span>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">ID</label>
								<div class="col-md-6">
									<input  readonly class="form-control" name="id" value="<?= $data['user_data']->id?>"/>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] :$data['user_data']->name?>"/>
								</div>
							</div>

							<div class="form-group row">
								<label for="email_address" class="col-md-4 col-form-label text-md-right">Email Address</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $data['user_data']->email;?>"/>
								</div>
							</div>

							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
								Update
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
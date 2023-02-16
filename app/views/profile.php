<?php $this->view("header",$data); ?>
<div class="cotainer">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<div class="card">
					<div class="card-header">Profile</div>
					<div class="card-body">
						<form method="post">
                            <div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">ID</label>
								<div class="col-md-6">
									<input  readonly class="form-control" value="<?= $data['user_data']->id?>"/>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Full Name</label>
								<div class="col-md-6">
									<input  readonly class="form-control" value="<?=$data['user_data']->name?>"/>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Email Address</label>
								<div class="col-md-6">
									<input  readonly class="form-control" value="<?= $data['user_data']->email;?>"/>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-md-4 col-form-label text-md-right">Role</label>
								<div class="col-md-6">
									<input readonly class="form-control" value="<?= $data['user_data']->role?>"/>
								</div>
							</div>
                        </form>
					</div>
				</div>
		</div>
	</div>
</div>
<?php $this->view("footer",$data); ?>
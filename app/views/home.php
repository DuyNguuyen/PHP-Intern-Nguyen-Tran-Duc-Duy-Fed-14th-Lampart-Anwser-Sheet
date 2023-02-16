<?php $this->view("header",$data); ?>
	
<section class="p-2">
	<div class="row height d-flex justify-content-center align-items-center">
		<div class="col-md-6">
			<div class="form">
				<form method="get">
					<div class="form-group row">
						<input type="text" name="find" class="col-md-9 form-control form-input"
								placeholder="Search anything..." value="<?= isset($_GET['find']) ? $_GET['find'] : '';?>">
						<div class="col-md-1">
							<button type="submit" class="btn form-control btn-sm btn-link">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
  		</div>
	</div>
	<!-- Suggestions will be displayed in below div. -->
	<div id="display"></div>
	<div class="ctable-responsive">
		<table class="table">
			<thead>
				<tr>
					<th scope="col" class="cole-3">#</th>
					<th scope="col" class="cole-3">Fullname</th>
					<th scope="col" class="cole-3">Email</th>
					<th scope="col" class="cole-3">Role</th>
					<th scope="col" class="text-center cole-3">Operations</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($users) && is_array($users)):?>
					<?php foreach($users as $user):?>
						<tr style="position: relative;">
							<td scope="row" class="cole-3"><?=$user->id?></td>
							<td class="cole-3"><a><?=$user->name?></a></td>
							<td class="cole-3"><?=$user->email?></td>
							<td class="cole-3"><?=ucfirst($user->role)?></td>
							<td class="text-center cole-3">
								<a href="<?=ROOT?>edit?id=<?= $user->id?>" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
								<a href="<?=ROOT?>delete?id=<?= $user->id?>" data-toggle="tooltip" title="Delete"><i class="fas fa-minus-circle"></i></a>
								<input hidden id="<?= $user->id?>" value="<?= str_replace("stdClass Object","" , print_r($user, true))?>">
								<a href="#" data-toggle="tooltip" title="Copy" onclick="copyContent(<?= $user->id?>)"><i class="fa-solid fa-copy"></i></a>
								<a href="<?=ROOT?>profile?id=<?= $user->id?>" data-toggle="tooltip" title="View"><i class="fa-solid fa-eye"></i></a>
							</td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
		</table>
	</div>
</section>

<?php $this->view("footer",$data); ?>


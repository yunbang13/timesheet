<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<div class="row">
					<div class="small-12 columns">
						<i class="fa fa-list"></i> <span>Team Members List</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="callout">
		<div class="small-12 columns">
			<table width="100%">
				<thead>
					<tr>
						<th width="3">#</th>
						<th>Name</th>
						<th>Telephone</th>
						<th>Email</th>
						<?php if($_SESSION['organization_type']==1):?>
							<th>Last Login</th>
						<?php endif;?>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $bil=0; foreach($employee_list as $emp): $bil++;?>
						<tr>
							<td><?php echo $bil;?></td>
							<td><?php echo $emp->fullname;?></td>
							<td><?php echo $emp->emp_phone;?></td>
							<td><?php echo $emp->email_user;?></td>
							<?php if($_SESSION['organization_type']==1):?>
								<td></td>
							<?php endif;?>
							<td></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
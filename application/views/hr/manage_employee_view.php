<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<div class="row">
					<div class="small-12 columns">
						<i class="fa fa-list"></i> <span>Employee List</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="callout">
		<div class="small-12 columns">
			<div class="float-right">
				<!-- <button class="button small">Search Employee</button> -->
				<button class="button small" onclick="location.href='<?php echo base_url();?>humanresource/new_employee'">Add New Employee</button>
			</div>
		</div>
		<div class="small-12 columns">
			<table width="100%">
				<thead>
					<tr>
						<th width="3">#</th>
						<th>Name</th>
						<th>EPF No.</th>
						<th>Role</th>
						<th>Dept.</th>
						<th>Email</th>
						<th>Status</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $bil=0; foreach($maklumat_employee as $emp): $bil++;

						$active = $emp->status_user;
						if($active==9){
							$text = "Active";
							$color = "success";
						} else {
							$text = "Inactive";
							$color = "alert";
						}


					?>
						<tr>
							<td><?php echo $bil;?></td>
							<td><?php echo $emp->fullname;?></td>
							<td><?php echo $emp->emp_epfno;?></td>
							<td><?php echo $emp->desc_role;?></td>
							<td><?php echo $emp->desc_dept;?></td>
							<td><?php echo $emp->email_user;?></td>
							<td><span class="label <?php echo $color;?>" style="color:#fff;font-weight:bold;"><?php echo $text;?></span></td>
							<td width="10"><a href="<?php echo base_url();?>humanresource/edit_employee/<?php echo $emp->idlogin;?>-<?php echo $emp->fullname;?>"><i class="fa fa-pencil"></i></a></td>
							<td width="10"><i class="fa fa-trash"></i></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
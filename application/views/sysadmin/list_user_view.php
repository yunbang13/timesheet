<?php

if($_SESSION['organization_type']==1){
	if($_SESSION['role_user']==2){
		$panggilan = "Staff";
	} else {
		$panggilan = "Teachers";
	}
} else {
	$panggilan = "Users";
}

?>
<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<div class="row">
						<div class="small-12 columns">
							<i class="fa fa-list"></i> <span><?php echo $panggilan;?> List</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="callout">
			<div class="float-right">
				<button class="small button" onclick="location.href='<?php echo base_url();?><?php echo $module;?>/new_user'">Add New <?php echo $panggilan;?></button>
			</div>
			<table width="100%">
				<thead>
					<tr>
						<th width="3">#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Role</th>
						<?php if($_SESSION['organization_type']==1):?>
						<th>Class</th>
						<?php else:?>
						<th>Department</th>
						<?php endif;?>
						<th>Status</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						$bil=0; foreach($all_user as $user): $bil++;

						$active = $user->status_user;
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
							<td><?php echo $user->fullname;?></td>
							<td><?php echo $user->email_user;?></td>
							<td><?php echo $user->desc_role;?></td>
							<?php if($_SESSION['organization_type']==1):?>
								<?php if($user->role_user==6 or $user->role_user==7):?>
									<td>&nbsp;</td>
								<?php else:?>
									<td><a href="<?php echo base_url();?>adminsekolah/manage_kelas/<?php echo $user->idlogin;?>/<?php echo $user->fullname;?>"><?php echo $jumlah_kelas->allClass($user->idlogin);?> Class</a></td>
								<?php endif;?>
							<?php else:?>
							<td><?php echo $desc_dept;?></td>
							<?php endif;?>
							<td><span class="label <?php echo $color;?>" style="color:#fff;font-weight:bold;"><?php echo $text;?></span></td>
							<td width="10"><a href="<?php echo base_url();?><?php echo $module;?>/edit_user/<?php echo $user->idlogin;?>-<?php echo $user->fullname;?>"><i class="fa fa-pencil"></i></a></td>
							<td width="10"><i class="fa fa-trash"></i></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
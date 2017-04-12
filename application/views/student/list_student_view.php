<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<span>Student List</span>
			</div>
		</div>
	</div>
	<div class="callout">
		<div class="small-12 columns float-right">
			<button class="small button" onclick="location.href='<?php echo base_url();?><?php echo $module;?>/new_student'">New Student</button>
		</div>
		<div class="small-12 columns">
			<table width="100%">
				<thead>
					<tr>
						<th width="3">#</th>
						<th>Name</th>
						<th>Level</th>
						<th>Class</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $bil = 0; foreach($all_student as $stud): $bil++;?>
						<tr>
							<td><?php echo $bil;?></td>
							<td><?php echo $stud->studName;?></td>
							<td><?php echo $stud->desc_level;?></td>
							<td><?php echo $stud->desc_class;?></td>
							<td width="10"><i class="fa fa-pencil"></i></td>
							<td width="10"><i class="fa fa-trash"></i></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
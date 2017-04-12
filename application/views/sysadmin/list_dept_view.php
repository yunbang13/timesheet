<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<div class="row">
						<div class="small-12 columns">
							<i class="fa fa-list"></i> <span>Department List</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="callout">
			<div class="small-12 columns">
				<div class="float-right">
					<button class="small button" onclick="location.href='<?php echo base_url();?>sysadmin/new_dept'">Add New Department</button>
				</div>
			</div>
			<div class="small-12 columns">
				<table width="100%">
					<thead>
						<tr>
							<th width="3">#</th>
							<th>Department</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$bil=0; foreach($all_dept as $dept): $bil++;

						?>
							<tr>
								<td><?php echo $bil;?></td>
								<td><?php echo $dept->description;?></td>
								<td width="10"><a href="<?php echo base_url();?>sysadmin/edit_dept/<?php echo $dept->id;?>-<?php echo $dept->description;?>"><i class="fa fa-pencil"></i></a></td>
								<td width="10"><i class="fa fa-trash"></i></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
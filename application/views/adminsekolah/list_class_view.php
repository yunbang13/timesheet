<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<span>Class list</span>
			</div>
		</div>
	</div>
	<div class="callout">
		<div class="float-right">
			<button class="small button" onclick="location.href='<?php echo base_url();?><?php echo $module;?>/page_addnewclass'">Add New Level</button>
		</div>
		<table width="100%">
			<thead>
				<tr>
					<th width="3">#</th>
					<th>Description</th>
					<th>Level</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $bil = 0; foreach($all_class as $class): $bil++;?>
					<tr>
						<td><?php echo $bil;?></td>
						<td><?php echo $class->desc_class;?></td>
						<td><?php echo $class->desc_level;?></td>
						<td width="10"><i class="fa fa-pencil"></i></td>
						<td width="10"><i class="fa fa-trash"></i></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>
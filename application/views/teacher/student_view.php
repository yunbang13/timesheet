<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span>Student List</span>
				</div>
			</div>
		</div>
		<div class="callout">
			<table width="100%">
				<thead>
					<tr>
						<th width="3">#</th>
						<th>Student Name</th>
						<th>Student ID</th>
						<th>Level Name</th>
						<th>Class Name</th>
					</tr>
				</thead>
				<tbody>
					<?php $bil=0; foreach($senarai_murid as $murid): $bil++;?>
						<tr>
							<td><?php echo $bil;?></td>
							<td><?php echo $murid->studName;?></td>
							<td><?php echo $murid->studID;?></td>
							<td><?php echo $murid->desc_level;?></td>
							<td><?php echo $murid->desc_class;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
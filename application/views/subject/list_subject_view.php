<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span>Subjects</span>
				</div>
			</div>
		</div>
		<div class="callout">
			<div class="small-12 columns">
				<button class="small button float-right" onclick="location.href='<?php echo base_url().$module;?>/new_subject'">Add New Subject</button>
			</div>
			<div class="small-12 columns">
				<table width="100%">
					<thead>
						<tr>
							<th width="3">#</th>
							<th>Subject</th>
							<th>Level</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $bil=0; foreach($subject_list as $list): $bil++;?>
							<tr>
								<td><?php echo $bil;?></td>
								<td><?php echo $list->subject;?></td>
								<td><?php echo $list->description;?></td>
								<td width="10"><i class="fa fa-pencil"></i></td>
								<td width="10"><i class="fa fa-trash"></i></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
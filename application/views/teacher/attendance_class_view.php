<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span>Today's (<?php echo date("d/m/Y");?>) Attendance</span>
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
						<th>Attendance</th>
						<th>Reason</th>
					</tr>
				</thead>
				<form action="<?php echo base_url();?>teacher/page_processAttendance" method="POST">
				<tbody>
					<?php $bil = 0; foreach($senarai_untuk_attendance as $senarai): $bil++;?>
						<tr>
							<td><?php echo $bil;?></td>
							<td><?php echo $senarai->studName;?></td>
							<td><?php echo $senarai->studID;?></td>
							<td valign="middle">
								<select name="slxAttend[]" id="">
									<option value="1">Attend</option>
									<option value="2">Not Attend</option>
								</select>
								<input type="hidden" name="hdnStudID[]" value="<?php echo $senarai->studID;?>">
							</td>
							<td><textarea name="txtAttendance[]" id="" cols="15" rows="5"></textarea></td>
						</tr>
					<?php endforeach;?>
					<tr>
						<td colspan="5"><input type="submit" class="button alert" value="Save Attendance"></td>
					</tr>
				</tbody>
				</form>
			</table>
		</div>
	</div>
</div>
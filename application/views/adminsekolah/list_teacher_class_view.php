<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<span>Class </span>
			</div>
		</div>
	</div>
	<?php
		foreach($maklumat_employee as $emp){
			$nama = $emp->fullname;
			$nokp = $emp->emp_nokp;
			$idlogin = $emp->idlogin;
		}
	?>
	<div class="callout">
		<div class="column small-4">
			<div class="card">
			  <div class="card-divider">
			    Teacher Information
			  </div>
			  <div class="card-section">
			    <div class="row">
			    	<div class="small-12 columns">
			    		<label for="">Name</label>
			    		<p style="font-weight:bold;"><?php echo $nama;?></p>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="small-12 columns">
			    		<label for="">IC No.</label>
			    		<?php echo $nokp;?>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="small-12 columns float-right">
			<button class="small button" onclick="location.href='<?php echo base_url();?>adminsekolah/new_class/<?php echo $idlogin;?>'">New Class</button>
		</div>
		<div class="small-12 column">
			<table width="100%">
				<thead>
					<tr>
						<th width="3">#</th>
						<th>Class</th>
						<th>Level</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $bil = 0; foreach($maklumat_kelas as $cls): $bil++;?>
						<tr>
							<td><?php echo $bil;?></td>
							<td><?php echo $cls->desc_class;?></td>
							<td><?php echo $cls->desc_level;?></td>
							<td width="10"><i class="fa fa-pencil"></i></td>
							<td width="10"><i class="fa fa-trash"></i></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
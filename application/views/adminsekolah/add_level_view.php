<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<span>Add New Level</span>
			</div>
		</div>
	</div>
	<div class="callout">
		<form action="<?php echo base_url();?><?php echo $module;?>/process_newlevel" method="POST">
			<div class="small-12 columns">
				<label for="">New Level</label>
				<input type="text" name="inpTingkatan">
			</div>
			<div class="small-12 columns">
				
				<input type="submit" class="button small" value="Submit">
			</div>
		</form>
	</div>
</div>
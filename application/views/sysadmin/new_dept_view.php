<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<i class="fa fa-plus-circle"></i> <?php echo $action;?>
				</div>
			</div>
		</div>
		<?php

		$desc = $iddept = "";

		foreach($dept_info as $dept):
			$desc = $dept->description;
			$iddept = $dept->id;
		endforeach;

		?>
		<div class="callout">
			<div class="small-12 columns">
				<form action="<?php echo base_url();?>sysadmin/<?php echo $page_process;?>" method="POST" data-abide novalidate>
					<div class="row">
						<div class="small-12 columns">
							<label for="">Department Name <span style="color:red">*</span></label>
							<input type="text" name="inpDescriptionRoleBaru" required value="<?php echo $desc;?>">
							<span class="form-error">
				              Don't forget to fill this in, it's required.
				            </span>
						</div>
					</div>
					<div class="row">
						<div class="small-12 columns">
							<input type="submit" name="btnSubmit" class="button small" value="Save">
							<input type="hidden" name="hdnIDDept" value="<?php echo $iddept;?>">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
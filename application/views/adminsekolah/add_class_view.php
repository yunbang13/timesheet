<div class="small-12 columns">
	<div class="title-bar">
		<div class="title-bar-left">
			<div class="title-bar-title">
				<span>Add New Class</span>
			</div>
		</div>
	</div>
	<div class="callout">
		<form action="<?php echo base_url();?><?php echo $module;?>/process_newclass" method="POST" data-abide novalidate>
			<div class="small-12 columns">
				<label for="">Class Name <span style="color:red">*</span></label>
				<input type="text" name="inpNamaKelas" required>
				<span class="form-error">
					Please insert class name. It is important!
				</span>
			</div>
			<div class="small-12 columns">
				<label for="">Level <span style="color:red">*</span></label>
				<select name="slxLevel" id="" required>
					<option value="">- SELECT -</option>
					<?php foreach($all_level as $level):?>
						<option value="<?php echo $level->idlevel;?>"><?php echo $level->description;?></option>
					<?php endforeach;?>
				</select>
				<span class="form-error">
					Please select level. It is important!
				</span>
			</div>
			<div class="small-12 columns">
				
				<input type="submit" class="button small" value="Submit">
			</div>
		</form>
	</div>
</div>
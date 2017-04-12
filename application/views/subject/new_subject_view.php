<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span><?php echo $action;?> Subject</span>
				</div>
			</div>
		</div>
		<div class="callout">
			<form action="<?php echo base_url().$module;?>/page_addnewsubject" method="POST">
				<div class="row">
					<div class="small-6 columns">
						<label for="">Subject Code</label>
						<input type="text" name="inpSubjectCode">
					</div>
					<div class="small-6 columns">
						<label for="">Subject Name</label>
						<input type="text" name="inpSubjectName">
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<label for="">For Level</label>
						<select name="slxLevel" id="">
							<option value="">- SELECT -</option>
							<?php foreach($all_level as $level):?>
								<option value="<?php echo $level->idlevel;?>"><?php echo $level->description;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<input type="submit" class="button small" name="btnSubmit" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
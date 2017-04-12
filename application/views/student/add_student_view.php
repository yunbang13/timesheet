<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("change","#slxLevel",function(){

			var hdnURL = $("#hdnURL").val();
			var kelas = $(this).val();

			$.ajax({
				dataType: "json",
				type:"POST",
				url:hdnURL+"ajax/panggil_level",
				data:"kelas="+kelas,
				success : function(data){
					// alert(data);
					console.log(data);
					var toAppend = "";
					// toAppend += "<select name='slxClass'>";
					toAppend += "<option value=''>- SELECT -</option>";
			        $.each(data,function(i,o){
			           toAppend += "<option value='"+o.idclass+"'>"+o.desc_class+"</option>";
			        });
			        // toAppend += "</select>";

			        if(data != 0){
			        	$('#sessions').append(toAppend);
					} else {
						document.getElementById("sessions").options.length = 0;
					}
			        
				}

			});
		});
	});
</script>
<div class="row">
	<div class="small-12 columns">
		<div class="title-bar">
			<div class="title-bar-left">
				<div class="title-bar-title">
					<span><?php echo $action;?> Student</span>
				</div>
			</div>
		</div>
		<div class="callout">
			<form action="<?php echo base_url();?><?php echo $module;?>/page_addnewstudent" method="POST" data-abide novalidate>
				<div class="row">
					<div class="small-12 columns">
						<label for="">Name</label>
						<input type="text" name="inpStudentName" required>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label for="">No KP</label>
						<input type="text" name="inpStudentNoKP" pattern="number" required>
					</div>
					<div class="small-6 columns">
						<label for="">Date Of Birth</label>
						<input type="date" name="inpStudentDOB" required>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label for="">Level</label>
						<select name="slxLevel" id="slxLevel">
							<option value="">- SELECT -</option>
							<?php foreach($all_level as $lvl):?>
								<option value="<?php echo $lvl->idlevel;?>"><?php echo $lvl->description;?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="small-6 columns">
						<label for="">Class</label>
						<select name="slxClass" id="sessions">
							<!-- <option value="">- SELECT -</option> -->
						</select>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="small-12 columns text-center">
						<input type="hidden" id="hdnURL" value="<?php echo base_url();?>">
						<input type="submit" name="btnSubmit" value="Submit" class="button small">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
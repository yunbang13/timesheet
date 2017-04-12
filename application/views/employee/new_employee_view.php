<script src="<?php echo base_url();?>js/vendor/new_emp.js"></script>
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

		$username = $roleuser = $position = $department = $status = $iduser = $employeeDOB = $fullname = $gender = $callname = $address = $telephone = $telephone2 = $salary = $noEPF = $percentEPF = $amountEPF = $startWork = $endWork = $normalLeave = $maternityLeave = $medicalLeave = $roleUser = $class = $level = $nokp = "";
		$placeholder = "******************";
		$requiredpassword = "required";
		$idlogin = 0;

		foreach($maklumat_employee as $emp){

			$username = $emp->katanama;
			$placeholder = "Please leave empty if not changing password!";
			$requiredpassword = "";
			$employeeID = $emp->emp_id;
			$employeeDOB = $emp->emp_dob;
			$gender = $emp->emp_gender;
			$fullname = $emp->emp_fullname;
			$callname = $emp->emp_callname;
			$address = $emp->emp_address;
			$noEPF = $emp->emp_epfno;
			$percentEPF = $emp->emp_epf_percent;
			$amountEPF = $emp->emp_epf_value;
			$telephone = $emp->emp_phone;
			$telephone2 = $emp->emp_phone2;
			$normalLeave = $emp->emp_leave;
			$medicalLeave = $emp->emp_medical;
			$maternityLeave = $emp->emp_maternity;
			$department = $emp->dept_user;
			$position = $emp->post_user;
			$status = $emp->status_user;
			$salary = $emp->emp_salary;
			$startWork = $emp->emp_startwork;
			$endWork = $emp->emp_endwork;
			$roleUser = $emp->role_user;
			$idlogin = $emp->idlogin;
			$level = $emp->level_user;
			$class = $emp->class_user;
			$nokp = $emo->emp_nokp;

		}

		?>
		<div class="callout">
			<form action="<?php echo base_url();?><?php echo $module;?>/<?php echo $page_form;?>" method="POST" data-abide novalidate>
				<div class="row">
					<div class="small-6 columns">
						<label for="">Username <span style="color:red">*</span></label>
						<input type="email" name="inpUsernameBaru" id="inpUsernameBaru" placeholder="email@domain.com" required value="<?php echo $username;?>">
						<span id="passEmail"></span>
						<span class="form-error">
			              Please fill in employee username, it's required.
			            </span>
					</div>
					<div class="small-6 columns">
						<label for="">Password <span style="color:red">*</span></label>
						<input type="password" name="inpPasswordBaru" placeholder="<?php echo $placeholder;?>" <?php echo $requiredpassword;?>>
						<span class="form-error">
			              Please fill in employee password, it's required.
			            </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="small-4 columns">
						<label for="">Employee ID</label>
						<input type="text" name="inpEmployeeIDBaru" readonly placeholder="Auto generate" value="<?php echo str_pad($employeeID, 5, "0", STR_PAD_LEFT);;?>">
					</div>
					<div class="small-4 columns">
						<label for="">Date of Birth <span style="color:red">*</span></label>
						<input type="date" name="inpDOBEmpBaru" required value="<?php echo $employeeDOB;?>">
						<span class="form-error">
			              Please fill in employee DOB, it's required.
			            </span>
					</div>
					<div class="small-4 columns">
						<label for="">Gender <span style="color:red">*</span></label>
						<select name="slxGender" id="slxGender" required>
							<option value="">- Select -</option>
							<option value="M" <?php if($gender=="M"){echo "SELECTED";}?>>Male</option>
							<option value="F" <?php if($gender=="F"){echo "SELECTED";}?>>Female</option>
						</select>
						<span class="form-error">
			              Please fill in employee Gender, it's required.
			            </span>
					</div>
				</div>
				<div class="row">
					<div class="small-4 columns">
						<label for="">No KP</label>
						<input type="text" name="inpNoKP" required value="<?php echo $nokp;?>">
					</div>
				</div>
				<div class="row">
					<div class="small-8 columns">
						<label for="">Full name <span style="color:red">*</span></label>
						<input type="text" name="inpFullNameBaru" required value="<?php echo $fullname;?>">
						<span class="form-error">
			              Don't forget employee fullname, it's required.
			            </span>
					</div>
					<div class="small-4 columns">
						<label for="">Call name <span style="color:red">*</span></label>
						<input type="text" name="inpCallNameEmpBaru" required value="<?php echo $callname;?>">
						<span class="form-error">
			              Don't forget employee short name, it's required.
			            </span>
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<label for="">Address <span style="color:red">*</span></label>
						<textarea name="txtEmpAddressBaru" id="" cols="30" rows="10"><?php echo $address;?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns">
						<label for="">Telephone No (Main) <span style="color:red">*</span></label>
						<input type="text" name="inpTelephoneEmpBaru" pattern="number" required value="<?php echo $telephone;?>">
						<span class="form-error">
			              Please fill in employee Main phone no., it's required.
			            </span>
					</div>
					<div class="small-6 columns">
						<label for="">Telephone No (Optional)</label>
						<input type="text" name="inpTelephoneEmpBaru2" pattern="number" value="<?php echo $telephone2;?>">
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="small-4 columns">
						<label for="">Salary Amount (RM) <span style="color:red">*</span></label>
						<div class="input-group">
						  <span class="input-group-label">RM</span>
						  <input class="input-group-field" name="inpSalaryEmpBaru" id="inpSalaryEmpBaru" type="number" min="0" value="<?php echo $salary;?>" required>
						</div>
						<span class="form-error">
			              Please fill in employee salary, it's required.
			            </span>
					</div>
				</div>
				<div class="row">
					<div class="small-4 columns">
						<label for="">EPF No <span style="color:red">*</span></label>
						<input type="text" name="inpNoEPFEmpBaru" required value="<?php echo $noEPF;?>">
						<span class="form-error">
			              Please fill in employee EPF No., it's required.
			            </span>
					</div>
					<div class="small-4 columns">
						<label for="">EPF Percent (%)</label>
						<div class="input-group">
						  <input class="input-group-field" name="inpEPFPercentEmpBaru" id="inpEPFPercentEmpBaru" type="number" value="11" min="9" max="11" value="<?php echo $percentEPF;?>">
						  <span class="input-group-label">%</span>
						</div>
					</div>
					<div class="small-4 columns">
						<label for="">EPF Amount (RM) <span style="color:red">*</span></label>
						<div class="input-group">
						  <span class="input-group-label">RM</span>
						  <input class="input-group-field" name="inpEPFAmountEmpBaru" id="inpEPFAmountEmpBaru" type="number" readonly value="<?php echo $amountEPF;?>">
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="small-6 columns">
						<label for="">Start Working Date <span style="color:red">*</span></label>
						<input type="date" name="inpStartWorkEmpbaru" required value="<?php echo $startWork;?>">
						<span class="form-error">
			              Please fill in employee working date, it's required.
			            </span>
					</div>
					<div class="small-6 columns">
						<label for="">End Working Date</label>
						<input type="date" name="inpEndWorkEmpbaru" value="<?php echo $endWork;?>">
					</div>
				</div>
				<div class="row">
					<div class="small-4 columns">
						<label for="">No of Leave <span style="color:red">*</span></label>
						<div class="input-group">
						  <input class="input-group-field" name="inpLeaveEmpBaru" id="inpLeaveEmpBaru" type="number" min="0" required value="<?php echo $normalLeave;?>">
						  <span class="input-group-label">Day(s)</span>
						</div>
						<span class="form-error">
			              Please fill in employee's amount of leave days , it's required.
			            </span>
					</div>
					<div class="small-4 columns">
						<label for="">Medical Leave <span style="color:red">*</span></label>
						<div class="input-group">
						  <input class="input-group-field" name="inpMedicalLeave" id="inpMedicalLeave" type="number" min="0" required value="<?php echo $medicalLeave;?>">
						  <span class="input-group-label">Day(s)</span>
						</div>
						<span class="form-error">
			              Please fill in employee's amount of leave days , it's required.
			            </span>
					</div>
					<div class="small-4 columns simpanKalauGenderMale">
						<label for="">No of Maternity Leave</label>
						<div class="input-group">
						  <input class="input-group-field" name="inpBeranakEmpBaru" id="inpBeranakEmpBaru" type="number" min="0" value="<?php echo $maternityLeave;?>">
						  <span class="input-group-label">Day(s)</span>
						</div>
					</div>
				</div>
				<?php
				if($_SESSION['organization_type']==2):
				?>
				<div class="row">
					<div class="small-12 columns">
						<label for="">Department</label>
						<select name="inpDepartmentBaru" id="">
							<option value="9">- SELECT -</option>
							<?php foreach($dept_user as $dept):?>
								<option <?php if($department==$dept->id){echo "SELECTED";}?> value="<?php echo $dept->id;?>"><?php echo $dept->description;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>			
				<?php endif;?>
				<div class="row">
					<div class="small-6 columns">
						<label for="">Role <span style="color:red">*</span></label>
						<select name="slxRoleBaru" id="slxRoleBaru" required>
							<option value="">- SELECT -</option>
							<?php foreach($role_user as $role):?>
								<option <?php if($roleUser==$role->id){echo "SELECTED";}?> value="<?php echo $role->id;?>"><?php echo $role->description;?></option>
							<?php endforeach;?>
						</select>
						<span class="form-error">
			              Please fill in employee role , it's required.
			            </span>
					</div>
					<div class="small-6 columns hideKalauRoleHR">
						<label for="">Position in the company</label>
						<input type="text" name="inpPositionBaru" value="<?php echo $position;?>" placeholder="e.g. programmer, runner">
					</div>
				</div>
				<div class="row">
					<div class="small-12 columns">
						<label for="">Status : active? <span style="color:red">*</span></label> 
						<div class="switch">
						  <input class="switch-input" id="chkStatus" type="checkbox" <?php if($status==9){echo "checked";}?> name="chkStatus" value="9">
						  <label class="switch-paddle" for="chkStatus">
						    <span class="show-for-sr">Active</span>
						    <span class="switch-active" aria-hidden="true">Yes</span>
						    <span class="switch-inactive" aria-hidden="true">No</span>
						  </label>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="small-12 columns text-center">
						<input type="hidden" name="hdnID" value="<?php echo $idlogin;?>">
						<input type="hidden" id="hdnURL" value="<?php echo base_url();?>">
						<input type="submit" name="btnSubmit" id="btnSubmit" class="button small" value="Submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
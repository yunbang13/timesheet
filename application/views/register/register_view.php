<script src="<?php echo base_url();?>js/vendor/check_email.js"></script>
<style>
  .wrapper {
  	padding:3% 0;
  }
</style>
<div class="row wrapper align-center">
  <div class="medium-4 medium-centered small-4 small-centered large-4 large-centered columns ">

    <form action="<?php echo base_url();?>register/verify" method="POST" data-abide novalidate>
      <div class="row column box-login">
        <div class="row column log-in-form">
          <h3 class="text-center" style="font-weight:bold;">time<strong>Sheet</strong></h3>
          <h6 class="text-center">Register</h6>
          <label for="">Full name <span style="color:red">*</span>
            <input type="text" name="inpName" placeholder="ahmad bin salim" required>
            <span class="form-error">
              Yo, you had better fill this out, it's required.
            </span>
          </label>
          <label>Email <span style="color:red">*</span>
            <input type="text" name="emailLogin" placeholder="somebody@example.com" id="emailLogin" required>
            <span id="passEmail"></span>
            <span class="form-error">
              Yo, insert your email yo, it's required.
            </span>
          </label>
          <label>Password <span style="color:red">*</span>
            <input type="password" name="passwordLogin" id="password" placeholder="**********" required>
            <span class="form-error">
            Hey, enter a password!
          </span>
          </label>
          <label for="">Confirm Password <span style="color:red">*</span>
            <input type="password" name="passwordLoginConfirm" placeholder="**********" data-equalto="password" required>
            <span class="form-error">
            Hey, passwords are supposed to match!
          </span>
          </label>
          <label for="">Organization Name<span style="color:red">*</span>
            <input type="text" name="orgName" required>
            <span class="form-error">
              Organization's Name, it's required.
            </span>
          </label>
          <label for="">State<span style="color:red">*</span>
            <select name="slxState" id="slxStateSelection" required>
              <option value="">- SELECT -</option>
              <?php foreach($all_negeri as $negeri):?>
                <option value="<?php echo $negeri->KodNegeri;?>"><?php echo $negeri->Negeri;?></option>
              <?php endforeach;?>
            </select>
            <span class="form-error">
              Don't let state empty, it's required.
            </span>
          </label>
          <label for="">District<span style="color:red">*</span>
            <select name="slxDistrict" id="sessions" required>
              <!-- <option value="">- SELECT -</option> -->
            </select>
            <span class="form-error">
              Bruh, it's required la.
            </span>
          </label>
          <label for="">Register as Management? <span style="color:red">*</span><br>
            <input type="radio" name="rdoRegManagement" value="1"> Yes
            <input type="radio" name="rdoRegManagement" value="0" checked> No
          </label>
          <label for="">Organization Type <span style="color:red">*</span>
            <select name="slxOrganizationType" id="">
              <option value="">- Select -</option>
              <option value="1">Education</option>
              <option value="2">Business</option>
            </select>
          </label>
          
          <p><input type="submit" class="button expanded button_hitam" id="btnSubmit" value="Register" name="btnSubmit"></p>
          <p><input type="hidden" id="hdnURL" value="<?php echo base_url();?>"></p>
        </div>
      </div>
    </form>

  </div>
</div>
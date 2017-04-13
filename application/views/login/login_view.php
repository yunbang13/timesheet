<style>
  .wrapper {
  	padding:10% 0;
  }
</style>
<div class="row wrapper align-center">
  <div class="medium-4 medium-centered small-4 small-centered large-4 large-centered columns ">
    // Login page
    <form action="<?php echo base_url();?>login/verify" method="POST" data-abide novalidate>
      <div class="row column box-login">
        <div class="row column log-in-form">
          <h3 class="text-center" style="font-weight:bold;">time<strong>Sheet</strong></h3>
          <h6 class="text-center">Log in with you email account</h6>
          <label>Email
            <input type="text" name="emailLogin" placeholder="somebody@example.com" required>
            <span class="form-error">
              Please fill in your username , it's required.
            </span>
          </label>
          
          <label>Password
            <input type="password" name="passwordLogin" placeholder="Password" required>
            <span class="form-error">
              Please fill in your password , it's required.
            </span>
          </label>
          
          <p><input type="submit" class="button expanded button_hitam" value="Log In" name="btnSubmit"></p>
          <p class="text-center"><a href="#" class="forgot_password">Forgot your password?</a></p>   
        </div>
      </div>
    </form>

  </div>
</div>

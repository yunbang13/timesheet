  <div class="top-bar" style="box-shadow: 1px 1px 0 #ccc">
    <div class="top-bar-title show-for-large">
      <div class="small-12 columns" style="color:#222;letter-spacing: 2px;">
         <i class="fa fa-bars" data-toggle="my-info"></i> Welcome, <?php echo $info_organization;?> 
      </div>
    </div>
    <div>
      <div class="top-bar-left">
        <ul class="menu show-for-small-only">
            <li><a href=""><i class="fa fa-bell" aria-hidden="true"></i> <span class="badge">12</span></a></li>
        </ul>
      </div>
      <div class="top-bar-right " >
        <ul class="menu hide-for-small-only">  
          <li><a href=""><i class="fa fa-bell" aria-hidden="true"></i> <span class="badge" >12</span></a></li>
          <li><a href="<?php echo base_url();?>logout"><i class="fa fa-power-off" style="color:red;"  aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="title-bar hide-for-large">
    <div class="title-bar-left">
      <button class="menu-icon" type="button" data-open="my-info"></button>
      <span class="title-bar-title">Welcome, <?php echo $info_organization;?> </span>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="large-12 columns">
      <nav aria-label="You are here:" role="navigation">
        <ul class="breadcrumbs">
          <li><i class="fa fa-home" aria-hidden="true"></i></li>
          <li><?php echo $page;?></li>
          <?php if($action<>""):?>
          <li><?php echo $action;?></li>
          <?php endif;?>
        </ul>
      </nav>
    </div>
  </div>
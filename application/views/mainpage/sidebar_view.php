<!-- doktor -->
<script>
  $(document).ready(function(){

    $(function() {
      $('ul a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
    });

  });
</script>
<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left" style="background-color:#333;">
  <div class="top-bar">
    <div class="top-bar-title">
      <div class="row">
        <div class="large-12 small-12 columns">
          time<strong>Sheet</strong> <small>v1</small>
        </div>
      </div>
    </div>
  </div>
  <div class="row column">
    <div class="top-bar" style="background-color:#333;color:#fff;font-weight:bold;vertical-align: middle;display: table-cell; text-align:left;">
      <div class="top-bar-title">
        <div class="row">
          <div class="small-4 columns"><img src="http://placehold.it/200x200" style="width:350px;border-radius:50px;"></div>
          <div class="small-8 columns" style="font-size:11px;line-height: 18px;padding-top:1%;">
              <span>Hello <?php echo ucfirst($_SESSION['call_name']);?></span><br>
              <span>ONLINE &nbsp;<i class="fa fa-circle " style="color:green;" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>
    <br>
    <ul class="menu vertical" style="color:#fff;">
      <li class="menu-text">Main Navigation</li>
      <?php foreach($menu_user as $menu):?>
        <li><a href="<?php echo base_url().$menu->link;?>"><?php echo $menu->item;?></a></li>
      <?php endforeach;?>
      <li class="menu-text">Setting</li>
      <?php foreach($submenu as $sub):?>
        <li><a href="<?php echo base_url().$sub->link;?>"><?php echo $sub->item;?></a></li>
      <?php endforeach;?>
      <li><a href="">Profile</a></li>
      <li class="hide-for-large"><a href="<?php echo base_url();?>logout"><i class="fa fa-power-off"  style="color:#ccc;" aria-hidden="true"></i> <span style="color:#ccc;font-weight:bold;">Logout</span>  </a></li>
  	</ul>
  </div>
</div>
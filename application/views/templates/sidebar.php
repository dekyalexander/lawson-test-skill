<div class="main">
        <aside class="sidebar-wrapper">
        <div class="row">
        <div class="col-3 px-1 position-fixed" id="sticky-sidebar">
          <div class="sidebar left ">
            <div class="user-panel">
              <div class="pull-left image">
                <img src="<?php echo base_url().'assets';?>/img/user-role.png" width="100" height="100" class="rounded-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p><?php echo $title; ?></p>
                <p><i class="fa fa-circle text-success"></i> Online</p>
              </div>
            </div>
            <ul class="list-sidebar bg-defoult">

            <!-- Start Menu Admin -->


              <li> <a href="<?php echo site_url('dashboard_controller'); ?>"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a> </li>

              <li> <a href="#" data-toggle="collapse" data-target="#masterdata" class="collapsed active" > <i class="fa fa-database"></i> <span class="nav-label"> Master Data </span> <span class="fa fa-chevron-left pull-right"></span> </a>
              <ul class="sub-menu collapse" id="masterdata">
              <a href="<?php echo site_url('master_status_controller'); ?>">Master Status</a>
              <a href="<?php echo site_url('merchant_controller'); ?>">Merchant</a>
              <a href="<?php echo site_url('order_item_controller'); ?>">Order Items</a>
              <a href="<?php echo site_url('city_controller'); ?>">City</a>
              <a href="<?php echo site_url('order_status_controller'); ?>">Order Status</a>
              <a href="<?php echo site_url('users_controller'); ?>">Users</a>
              <a href="<?php echo site_url('product_controller'); ?>">Products</a>
              </ul>
            </li>

               <!-- End Menu Admin -->

    </div>
    </aside>
    <div class="col-9 offset-2" id="main">
      <?php echo $contents ;?>
    </div>
    </div>
    </div>
    </div>
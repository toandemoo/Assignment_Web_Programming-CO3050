<?php $this->view("./admin/Shared/header"); ?>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">
      
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= ROOT ?>admin" class="brand-link">
         <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="<?= ROOT ?>infoAdmin" class="d-block">Alexander Pierce</a>
         </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                  <a href="<?= ROOT ?>admin" class="nav-link active">
                     <i class="nav-icon fa fa-house-user"></i>
                     <p>Dashboard</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>products" class="nav-link">
                     <i class="nav-icon fa fa-shopping-cart"></i>
                     <p>
                        Products
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>orders" class="nav-link">
                     <i class="nav-icon fa fa-shopping-bag"></i>
                     <p>
                        Orders
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>customers" class="nav-link">
                     <i class="nav-icon fa fa-user"></i>
                     <p>
                        Customers
                     </p>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Dashboard</h1>
               </div><!-- /.col -->
            </div><!-- /.row -->
         </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

       <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
    </section>

      <!-- Main content -->
      <div class="content">
         <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
               <div class="card">
               <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                     <h3 class="card-title">Online Store Visitors</h3>
                     <a href="javascript:void(0);">View Report</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex">
                     <p class="d-flex flex-column">
                     <span class="text-bold text-lg">820</span>
                     <span>Visitors Over Time</span>
                     </p>
                     <p class="ml-auto d-flex flex-column text-right">
                     <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 12.5%
                     </span>
                     <span class="text-muted">Since last week</span>
                     </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                     <canvas id="visitors-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                     <span class="mr-2">
                     <i class="fas fa-square text-primary"></i> This Week
                     </span>

                     <span>
                     <i class="fas fa-square text-gray"></i> Last Week
                     </span>
                  </div>
               </div>
               </div>
               <!-- /.card -->

               <div class="card">
               <div class="card-header border-0">
                  <h3 class="card-title">Products</h3>
                  <div class="card-tools">
                     <a href="#" class="btn btn-tool btn-sm">
                     <i class="fas fa-download"></i>
                     </a>
                     <a href="#" class="btn btn-tool btn-sm">
                     <i class="fas fa-bars"></i>
                     </a>
                  </div>
               </div>
               <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                     <thead>
                     <tr>
                     <th>Product</th>
                     <th>Price</th>
                     <th>Sales</th>
                     <th>More</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                     <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Some Product
                     </td>
                     <td>$13 USD</td>
                     <td>
                        <small class="text-success mr-1">
                           <i class="fas fa-arrow-up"></i>
                           12%
                        </small>
                        12,000 Sold
                     </td>
                     <td>
                        <a href="#" class="text-muted">
                           <i class="fas fa-search"></i>
                        </a>
                     </td>
                     </tr>
                     <tr>
                     <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Another Product
                     </td>
                     <td>$29 USD</td>
                     <td>
                        <small class="text-warning mr-1">
                           <i class="fas fa-arrow-down"></i>
                           0.5%
                        </small>
                        123,234 Sold
                     </td>
                     <td>
                        <a href="#" class="text-muted">
                           <i class="fas fa-search"></i>
                        </a>
                     </td>
                     </tr>
                     <tr>
                     <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Amazing Product
                     </td>
                     <td>$1,230 USD</td>
                     <td>
                        <small class="text-danger mr-1">
                           <i class="fas fa-arrow-down"></i>
                           3%
                        </small>
                        198 Sold
                     </td>
                     <td>
                        <a href="#" class="text-muted">
                           <i class="fas fa-search"></i>
                        </a>
                     </td>
                     </tr>
                     <tr>
                     <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Perfect Item
                        <span class="badge bg-danger">NEW</span>
                     </td>
                     <td>$199 USD</td>
                     <td>
                        <small class="text-success mr-1">
                           <i class="fas fa-arrow-up"></i>
                           63%
                        </small>
                        87 Sold
                     </td>
                     <td>
                        <a href="#" class="text-muted">
                           <i class="fas fa-search"></i>
                        </a>
                     </td>
                     </tr>
                     </tbody>
                  </table>
               </div>
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
               <div class="card">
               <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                     <h3 class="card-title">Sales</h3>
                     <a href="javascript:void(0);">View Report</a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex">
                     <p class="d-flex flex-column">
                     <span class="text-bold text-lg">$18,230.00</span>
                     <span>Sales Over Time</span>
                     </p>
                     <p class="ml-auto d-flex flex-column text-right">
                     <span class="text-success">
                        <i class="fas fa-arrow-up"></i> 33.1%
                     </span>
                     <span class="text-muted">Since last month</span>
                     </p>
                  </div>
                  <!-- /.d-flex -->

                  <div class="position-relative mb-4">
                     <canvas id="sales-chart" height="200"></canvas>
                  </div>

                  <div class="d-flex flex-row justify-content-end">
                     <span class="mr-2">
                     <i class="fas fa-square text-primary"></i> This year
                     </span>

                     <span>
                     <i class="fas fa-square text-gray"></i> Last year
                     </span>
                  </div>
               </div>
               </div>
               <!-- /.card -->

               <div class="card">
               <div class="card-header border-0">
                  <h3 class="card-title">Online Store Overview</h3>
                  <div class="card-tools">
                     <a href="#" class="btn btn-sm btn-tool">
                     <i class="fas fa-download"></i>
                     </a>
                     <a href="#" class="btn btn-sm btn-tool">
                     <i class="fas fa-bars"></i>
                     </a>
                  </div>
               </div>
               <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                     <p class="text-success text-xl">
                     <i class="ion ion-ios-refresh-empty"></i>
                     </p>
                     <p class="d-flex flex-column text-right">
                     <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-up text-success"></i> 12%
                     </span>
                     <span class="text-muted">CONVERSION RATE</span>
                     </p>
                  </div>
                  <!-- /.d-flex -->
                  <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                     <p class="text-warning text-xl">
                     <i class="ion ion-ios-cart-outline"></i>
                     </p>
                     <p class="d-flex flex-column text-right">
                     <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                     </span>
                     <span class="text-muted">SALES RATE</span>
                     </p>
                  </div>
                  <!-- /.d-flex -->
                  <div class="d-flex justify-content-between align-items-center mb-0">
                     <p class="text-danger text-xl">
                     <i class="ion ion-ios-people-outline"></i>
                     </p>
                     <p class="d-flex flex-column text-right">
                     <span class="font-weight-bold">
                        <i class="ion ion-android-arrow-down text-danger"></i> 1%
                     </span>
                     <span class="text-muted">REGISTRATION RATE</span>
                     </p>
                  </div>
                  <!-- /.d-flex -->
               </div>
               </div>
            </div>
            <!-- /.col-md-6 -->
         </div>
         <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->

<?php $this->view("./admin/Shared/footer"); ?>
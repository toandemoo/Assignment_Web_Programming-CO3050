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
    <div class="col-lg-3 ml-auto">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">All Orders</a></li>
        <li class="breadcrumb-item active">Detail Order</li>
      </ol>
    </div><!-- /.col -->

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
                  <a href="<?= ROOT ?>admin" class="nav-link">
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
                  <a href="<?= ROOT ?>orders" class="nav-link active">
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

   <!-- Main content -->
   <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <h2 class="mb-3">Customer</h2>
        <div class="row">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Name</span>
                <span class="info-box-text">Email</span>
                <span class="info-box-text">Phone number</span>
                <span class="info-box-text">Address</span>
                <span class="info-box-text">Note</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
    </section>

     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Orders</h1>
          </div>
          <!-- /.col -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
         <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">OrderID</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ProductID</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quanity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>Áo polo</td>
                      <td>200000</td>
                      <td>2</td>
                      <td>200000</td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>Áo polo</td>
                      <td>200000</td>
                      <td>2</td>
                      <td>200000</td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>Áo polo</td>
                      <td>200000</td>
                      <td>2</td>
                      <td>200000</td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>Áo polo</td>
                      <td>200000</td>
                      <td>2</td>
                      <td>200000</td>
                    </tr>
                    <tr>
                      <td>183</td>
                      <td>Áo polo</td>
                      <td>200000</td>
                      <td>2</td>
                      <td>200000</td>
                    </tr>
                  </tbody>
                </table>
              </div>
               <div class="mt-sm-3 ml-auto mr-lg-5">
                  <h3>Subtotal: 10000 vnđ</h3>
                  <h3>Discount: 10000 vnđ</h3>
                  <h3>Total: 10000 vnđ</h3>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
    </section>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timeline</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i>Tuesday 11:29 AM</span>
                  <h3 class="timeline-header">Order was placed </h3>
                  <div class="timeline-body">
                    Your order has been placed successfully
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i>Tuesday 11:29 AM</span>
                  <h3 class="timeline-header">Order was placed </h3>
                  <div class="timeline-body">
                    Your order has been placed successfully
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i>Tuesday 11:29 AM</span>
                  <h3 class="timeline-header">Order was placed </h3>
                  <div class="timeline-body">
                    Your order has been placed successfully
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
    </section>
    <!-- /.content -->
   </div>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->

<?php $this->view("./admin/Shared/footer"); ?>

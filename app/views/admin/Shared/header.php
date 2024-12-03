<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=ROOT ?>plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=ROOT ?>dist/css/adminlte.min.css">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?=ASSETS ?>css/font-awesome.min.css"/>


</head>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">
      
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->

     <!-- Right navbar links -->
   <div class="dropdown ml-auto mr-3">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?= $_SESSION['email'] ?>
      </a>

      <div class="dropdown-menu">
         <a class="dropdown-item" href="<?= ROOT ?>infoAdmin">Thông tin cá nhân</a>
         <a class="dropdown-item" href="<?= ROOT ?>logout">Đăng xuất</a>
      </div>
   </div>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= ROOT ?>admin" class="brand-link">
         <img src="<?= ASSETS?>img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
         <br>
      </a>

      <?php
      $current_page = basename($_SERVER['REQUEST_URI']);
      ?>
      <!-- Sidebar -->
      <div class="sidebar">
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                  <a href="<?= ROOT ?>admin" class="nav-link <?= $current_page == 'admin' ? 'active' : '' ?>">
                     <i class="nav-icon fa fa-home"></i>
                     <p>Dashboard</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>products" class="nav-link <?= $current_page == 'products' ? 'active' : '' ?>">
                     <i class="nav-icon fa fa-shopping-cart"></i>
                     <p>Sản Phẩm</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>orders" class="nav-link <?= $current_page == 'orders' ? 'active' : '' ?>">
                     <i class="nav-icon fa fa-shopping-bag"></i>
                     <p>Đơn Hàng</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>customers" class="nav-link <?= $current_page == 'customers' ? 'active' : '' ?>">
                     <i class="nav-icon fa fa-user"></i>
                     <p>Khách Hàng</p>
                  </a>
               </li>
               <?php if ($_SESSION['role'] !== 'employee'): ?>
                  <li class="nav-item">
                     <a href="<?= ROOT ?>account" class="nav-link <?= $current_page == 'account' ? 'active' : '' ?>">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>Quản Lý</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= ROOT ?>account/addAccount" class="nav-link <?= $current_page == 'addAccount' ? 'active' : '' ?>">
                        <i class="nav-icon fa fa-user-plus"></i>
                        <p>Tạo tài khoản</p>
                     </a>
                  </li>
               <?php endif; ?>
            </ul>
         </nav>
      </div>

      <!-- /.sidebar -->
   </aside>

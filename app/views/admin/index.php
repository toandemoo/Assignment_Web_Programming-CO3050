<?php $this->view("./admin/Shared/header"); ?>

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
         <h1>Xin Chào <?= $_SESSION['email']?> </h1>
      </div>
    </section>

   </div>
   <!-- /.content-wrapper -->

<?php $this->view("./admin/Shared/footer"); ?>

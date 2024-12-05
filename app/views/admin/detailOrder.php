<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <h2 class="mb-3">Khách Hàng</h2>
        <div class="row">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Họ Tên: <?= $data['user']->name; ?></span>
                <span class="info-box-text">Email: <?= $data['user']->email; ?></span>
                <span class="info-box-text">Số điện thoại: <?= $data['user']->phone; ?></span>
                <span class="info-box-text">Địa chỉ: <?= $data['user']->address; ?></span>
                <span class="info-box-text">Ghi chú: chua co</span>
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
            <h1>Chi tiết đơn hàng</h1>
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
                    <thead>
                      <th>ProductID</th>
                      <th>Product Name</th>
                      <th>Quanity</th>
                      <th>Total Price</th>
                    </thead>
                  </thead>
                  <tbody>
                    <?php $total = 0 ?>
                    <?php if (is_array($data['orders'])): ?>
										<?php foreach ($data['orders'] as $row): ?>
                    <tr>
										<div class="row">
											<a href="#">
                        <td><?=$row->product_id?></td>
                        <td><?=$row->ptitle?></td>
                        <td><?=$row->quantity?></td>
                        <td><?=$row->totalAmount?></td>
                        <?php $total+= $row->totalAmount ?>
											</a>
										</div>
                    </tr>
										<!-- /product -->
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
                        <td colspan="4">
                           <p class="text-center">Không tìm thấy đơn hàng</p>
                        </td>
                     </tr>
										<?php endif; ?>
                  </tbody>
                </table>
              </div>
               <div class="mt-sm-3 ml-auto mr-lg-5">
                  <h3>Subtotal: <?=$total?></h3>
                  <h3>Discount: 10000 vnđ</h3>
                  <h3>Total: <?=$total?></h3>
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

<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Orders</h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
       <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pending</span>
                <span class="info-box-number">1,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Completed</span>
                <span class="info-box-number">410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Refunded</span>
                <span class="info-box-number">13,648</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Failed</span>
                <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </div>
      <div class="container-fluid">
         <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers</h3>

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
                      <th>OrderID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Payment</th>
                      <th>Status</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (is_array($data['rows'])): ?>
                        <?php foreach ($data['rows'] as $row): ?>
                            <tr>
                                <td><?=$row->id?></td>
                                <td><?=$row->user_id?></td>
                                <td>chua co</td>
                                <td>chua co</td>
                                <td>chua co</td>
                                <td>
                                  <button type="button" class="btn btn-danger col-sm-5" onclick="window.location='<?= ROOT ?>DetailOrder/<?=$row->id?>';">Xem</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <p class="text-center">Không tìm thấy sản phẩm nào.</p>
                        </div>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- pagination -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
              <li class="page-item <?= ($data['current_page'] == 1) ? 'disabled' : '' ?>">
                  <a class="page-link" href="<?= ROOT ?>orders/index?page=<?= $data['current_page'] - 1 ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              
              <?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
                  <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : '' ?>">
                      <a class="page-link" href="<?= ROOT ?>orders/index?page=<?= $i ?>"><?= $i ?></a>
                  </li>
              <?php endfor; ?>

              <li class="page-item <?= ($data['current_page'] == $data['total_pages']) ? 'disabled' : '' ?>">
                  <a class="page-link" href="<?= ROOT ?>orders/index?page=<?= $data['current_page'] + 1 ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
          </ul>
      </nav>

        <!-- pagination -->
    </section>
   </div>


   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->

<?php $this->view("./admin/Shared/footer"); ?>

<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Đơn Hàng</h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
       <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"></span>
              <div class="info-box-content">
                <span class="info-box-text">Đang Chờ</span>
                <span class="info-box-number"><?=$data['pending']?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"></span>
              <div class="info-box-content">
                <span class="info-box-text">Giao Thành Công</span>
                <span class="info-box-number"><?=$data['success']?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Trả Lại</span>
                <span class="info-box-number"><?=$data['refunded']?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"></span>

              <div class="info-box-content">
                <span class="info-box-text">Đã Hủy</span>
                <span class="info-box-number"><?=$data['canceled']?></span>
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
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm align-content-center" style="width: 100%;">
                      <form action="<?= ROOT ?>Orders/Search" method="GET">
                        <div class="input-group input-group-sm align-content-center" style="width: 100%;">
                          <input type="text" name="search" class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>OrderID</th>
                      <th>Họ Tên</th>
                      <th>Ngày tạo</th>
                      <th>Phương thức thanh toán</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (is_array($data['rows'])): ?>
                        <?php foreach ($data['rows'] as $row): ?>
                            <tr>
                                <td class="col-3"><?=$row->order_id?></td>
                                <td><?=$row->name?></td>
                                <td><?=$row->created_at?></td>
                                <td><?=$row->payment_method?></td>
                                <td><?=$row->status?></td>
                                <td>
                                  <button type="button" class="btn btn-danger col-sm-5" onclick="window.location='<?= ROOT ?>DetailOrder/<?=$row->order_id?>';">Xem</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                        <td colspan="6">
                           <p class="text-center">Không tìm thấy đon hàng</p>
                        </td>
                     </tr>
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

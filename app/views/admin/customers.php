<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tất Cả Khách Hàng</h1>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
         <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

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
                      <th>CustomerID</th>
                      <th>User</th>
                      <th>Order</th>
                      <th>Total Spent</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (is_array($data['rows'])): ?>
										<?php foreach ($data['rows'] as $row): ?>
                    <tr>
										<div class="row">
											<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
                        <td><?=$row->id?></td>
                        <td><?=$row->name?></td>
                        <td>huh</td>
                        <td>jijiji</td>
											</a>
										</div>
                    </tr>
										<!-- /product -->
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
                        <td colspan="4">
                           <p class="text-center">Không tìm thấy khách hàng</p>
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
        <!-- Phân trang -->
      <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
              <li class="page-item <?= $data['current_page'] == 1 ? 'disabled' : '' ?>">
                  <a class="page-link" href="?page=<?= $data['current_page'] - 1 ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              <?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
                  <li class="page-item <?= $data['current_page'] == $i ? 'active' : '' ?>">
                      <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                  </li>
              <?php endfor; ?>
              <li class="page-item <?= $data['current_page'] == $data['total_pages'] ? 'disabled' : '' ?>">
                  <a class="page-link" href="?page=<?= $data['current_page'] + 1 ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
          </ul>
      </nav>
      <!-- /phân trang -->

        <!-- pagination -->
    </section>
   </div>


   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
   </aside>
   <!-- /.control-sidebar -->

<?php $this->view("./admin/Shared/footer"); ?>

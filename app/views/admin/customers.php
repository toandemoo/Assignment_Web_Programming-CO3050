<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Khách Hàng</h1>
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
                  <div class="input-group input-group-sm align-content-center" style="width: 100%;">
                    <form action="<?= ROOT ?>Customers/Search" method="GET">
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="col-4">CustomerID</th>
                      <th class="col-4">Họ Tên</th>
                      <?php 
                      $page = isset($_GET['page']) ? "&page=" . $_GET['page'] : '';
                      ?>
                      <th class="col-4">
                        Sản Phẩm Đã Mua
                        <a href="?sort=totalOrders&order=asc<?php echo $page; ?>" class="text-success">
                            <?php 
                            if (!isset($_GET['order']) || (isset($_GET['order']) && $_GET['order'] == 'desc' && $_GET['sort'] == 'totalOrders')) {
                                echo ' &#8595;'; // Mũi tên tăng khi sắp xếp tăng dần
                            }
                            ?>
                        </a>
                        <a href="?sort=totalOrders&order=desc<?php echo $page; ?>" class="text-danger">
                            <?php 
                            if (isset($_GET['order']) && $_GET['order'] == 'asc' && $_GET['sort'] == 'totalOrders') {
                                echo ' &#8593;'; // Mũi tên giảm khi sắp xếp giảm dần
                            }
                            ?>
                        </a>
                      </th>

                      <!-- <th>Total Spent</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (is_array($data['rows'])): ?>
										<?php foreach ($data['rows'] as $row): ?>
                    <tr>
										<div class="row">
											<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
                        <td class="col-4"><?=$row->id?></td>
                        <td class="col-4"><?=$row->name?></td>
                        <td class="col-4"><?=$row->totalOrders?></td>
                        <!-- <td>jijiji</td> -->
											</a>
										</div>
                    </tr>
										<!-- /product -->
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
                        <td colspan="3">
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

                        <?php
                        // Lấy tham số tìm kiếm hiện tại
                        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
                        $sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Mặc định sắp xếp theo giá
                        $order = isset($_GET['order']) ? $_GET['order'] : ''; // Mặc định sắp xếp theo giá

                        $url = "?" .  ($sort ? "sort=" . urlencode($sort) : "") .  ($order ? "&order=" . urlencode($order) : "") .  ($searchQuery ? "&search=" . urlencode($searchQuery) : "");
                        ?>
      <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
              <li class="page-item <?= $data['current_page'] == 1 ? 'disabled' : '' ?>">
                  <a class="page-link" href="<?php echo $url; ?>&page=<?= $data['current_page'] - 1 ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              <?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
                  <li class="page-item <?= $data['current_page'] == $i ? 'active' : '' ?>">
                      <a class="page-link" href="<?php echo $url; ?>&page=<?= $i ?>"><?= $i ?></a>
                  </li>
              <?php endfor; ?>
              <li class="page-item <?= $data['current_page'] == $data['total_pages'] ? 'disabled' : '' ?>">
                  <a class="page-link" href="<?php echo $url; ?>&page=<?= $data['current_page'] + 1 ?>" aria-label="Next">
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

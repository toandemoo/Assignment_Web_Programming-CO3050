<?php $this->view("./admin/Shared/header"); ?>

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Danh Sách sản phẩm</h1>
            </div>
            <button type="button" class="col-sm-2 ml-auto mr-5 btn btn-block btn-info" data-toggle="modal" data-target="#addProductModal">+ Thêm sản phẩm</button>
            <!-- Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Nội dung modal -->
                    <form action="products/AddProduct" method="post">
                      <div class="form-group">
                        <label for="productName">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="productName" placeholder="name" name="productName">
                      </div>
                      <div class="form-group">
                        <label for="productCategory" class="mr-2">Loại</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="productCategory">
                          <option selected>Chọn</option>
                          <option value="Quần">Quần</option>
                          <option value="Áo">Áo</option>
                          <option value="Mũ">Mũ</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="productCategory" class="mr-2">Giới tính</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="productSex">
                          <option selected>Chọn</option>
                          <option value="Nam">Nam</option>
                          <option value="Nữ">Nữ</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="productPrice">Giá</label>
                        <input type="text" class="form-control" id="productPrice" placeholder="vnđ" name="productPrice">
                      </div>
                      <div class="form-group">
                        <label for="productImg">Ảnh</label>
                        <input type="text" class="form-control" id="productImg" placeholder="URL" name="productImg">
                      </div>
                      <div class="form-group">
                        <label for="productDescription">Mô tả</label>
                        <textarea class="form-control" id="productDescription" placeholder="Description" name="productDescription"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy Bỏ</button>
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
                      <form action="<?= ROOT ?>Products/Search" method="GET">
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
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Thể loại</th>
                        <?php
                        // Lấy tham số tìm kiếm hiện tại
                        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
                        $sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Mặc định sắp xếp theo giá
                        $page = isset($_GET['page']) ? $_GET['page'] : ''; // Mặc định sắp xếp theo giá

                        $ascUrl = "&order=asc" . ($searchQuery ? "&search=" . urlencode($searchQuery) : "")  . ($page ? "&page=" . urlencode($page) : "");
                        $descUrl = "&order=desc" . ($searchQuery ? "&search=" . urlencode($searchQuery) : "") . ($page ? "&page=" . urlencode($page) : "");;
                        ?>
                        <th>
                          Ngày tạo
                          <a href="?sort=create_at<?php echo $ascUrl; ?>" class="text-success">
                              <?php 
                              if (!isset($_GET['order'])) {
                                  echo ' &#8595;';
                              }elseif (isset($_GET['order']) && ($_GET['order'] == 'desc' && $_GET['sort'] == 'create_at'))
                              {
                                  echo ' &#8595;';
                              }
                              elseif (isset($_GET['order']) && $_GET['sort'] != 'create_at')
                              {
                                  echo ' &#8595;';
                              }
                              ?>
                          </a>
                          <a href="?sort=create_at<?php echo $descUrl; ?>" class="'text-danger">
                              <?php 
                              if (isset($_GET['order']) && $_GET['order'] == 'asc' && $_GET['sort'] == 'create_at') {
                                  echo ' &#8593;'; // Mũi tên giảm khi chọn giảm dần cho ngày tạo
                              }
                              ?>
                          </a>
                        </th>
                        <th>
                          Giá
                          <a href="?sort=pprice<?php echo $ascUrl; ?>" class="text-success">
                              <?php 
                              if (!isset($_GET['order'])) {
                                  echo ' &#8595;';
                              }elseif (isset($_GET['order']) && ($_GET['order'] == 'desc' && $_GET['sort'] == 'pprice'))
                              {
                                  echo ' &#8595;';
                              }
                              elseif (isset($_GET['order']) &&  $_GET['sort'] != 'pprice')
                              {
                                  echo ' &#8595;';
                              }
                              ?>
                          </a>
                          <a href="?sort=pprice<?php echo $descUrl; ?>" class="text-danger">
                              <?php 
                              if (isset($_GET['order']) && $_GET['order'] == 'asc' && $_GET['sort'] == 'pprice') {
                                  echo ' &#8593;'; // Mũi tên giảm khi chọn giảm dần
                              }
                              ?>
                          </a>
                        </th>

                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                    <!-- product -->
                    <?php if (is_array($data['rows'])): ?>
										<?php foreach ($data['rows'] as $row): ?>
                    <tr>
										<div class="row">
											<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
                        <td><?=$row->id?></td>
												<td style="width: 13%;">
													<span><img class="table-avatar rounded-2" style="width: 30%; height: 30%;" src="<?=$row->pimg?>" alt=""></span><?=$row->ptitle?>
												</td>
                        <td><?=$row->pkind?></td>
                        <td><?=$row->create_at?></td>
                        <td><?=$row->pprice?></td>
                        <td>
                          <button type="button" class="btn btn-info float-left col-sm-5 mr-1" onclick="window.location='<?= ROOT ?>DetailProduct/<?=$row->id?>';">Thêm Size</button>
                          <!-- <button type="button" class="btn btn-info float-left col-sm-5 mr-1" onclick="OpenModal()" data-toggle="modal" data-target="#editProductModal">Chỉnh sửa</button> -->
                          <!-- Modal -->
                          <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addProductModalLabel">Chỉnh sửa sản phẩm</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="products/AddProduct" method="post" style="display: none;" id="editForm">
                                      <div class="form-group">
                                        <label for="productName">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="productName" placeholder="name" name="productName" value="<?=$row->ptitle?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="productCategory" class="mr-2">Thể loại</label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="productCategory">
                                          <option selected>Chọn</option>
                                          <option value="Quần" <?= $row->pkind === 'Quần' ? 'selected' : '' ?>>Quần</option>
                                          <option value="Áo" <?= $row->pkind === 'Áo' ? 'selected' : '' ?>>Áo</option>
                                          <option value="Mũ" <?= $row->pkind === 'Mũ' ? 'selected' : '' ?>>Mũ</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="productSex" class="mr-2">Giới tính</label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="productSex">
                                          <option selected>Chọn</option>
                                          <option value="Nam" <?= $row->pgender === 'Nam' ? 'selected' : '' ?>>Nam</option>
                                          <option value="Nữ" <?= $row->pgender === 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="productPrice">Giá</label>
                                        <input type="text" class="form-control" id="productPrice" placeholder="vnđ" name="productPrice" value="<?=$row->pprice?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="productQuantity">Số lượng</label>
                                        <input type="text" class="form-control" id="productQuantity" placeholder="number" name="productQuantity" value="chua co">
                                      </div>
                                      <div class="form-group">
                                        <label for="productImg">Ảnh</label>
                                        <input type="text" class="form-control" id="productImg" placeholder="URL" name="productImg" value="<?=$row->pimg?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="productDescription">Mô tả</label>
                                       <textarea class="form-control" id="productDescription" placeholder="Description" name="productDescription">
                                          <?= htmlspecialchars($row->pdescription) ?>
                                      </textarea>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="CloseModal()">Hủy Bỏ</button>                                        
                                      </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <form action="<?= ROOT ?>Products/DeleteProduct/<?php echo $row->id; ?>" id="DeleteForm-<?php echo $row->id; ?>">
                            <input type="text" value="<?php echo $row->id; ?>" hidden />
                            <button type="button" class="btn btn-danger col-sm-5" onclick="DeleteFormjs(<?php echo $row->id; ?>)">Xóa</button>
                          </form>
                        </td>
											</a>
										</div>
                    </tr>
										<!-- /product -->
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
                        <td colspan="8">
                           <p class="text-center">Không tìm thấy sản phẩm</p>
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
                        <?php
                        // Lấy tham số tìm kiếm hiện tại
                        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
                        $sort = isset($_GET['sort']) ? $_GET['sort'] : ''; // Mặc định sắp xếp theo giá
                        $order = isset($_GET['order']) ? $_GET['order'] : ''; // Mặc định sắp xếp theo giá

                        $url = "?" .  ($sort ? "sort=" . urlencode($sort) : "") .  ($order ? "&order=" . urlencode($order) : "") .  ($searchQuery ? "&search=" . urlencode($searchQuery) : "");
                        ?>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
              <!-- Previous Page Link -->
              <li class="page-item <?= ($current_page == 1) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?php echo $url; ?>?page=1" aria-label="First">
                      <span aria-hidden="true">&laquo;&laquo;</span>
                  </a>
              </li>
              <li class="page-item <?= ($current_page == 1) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?php echo $url; ?>&page=<?= $current_page - 1; ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>

              <!-- Page Number Links -->
              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <li class="page-item <?= ($i == $current_page) ? 'active' : ''; ?>">
                      <a class="page-link" href="<?php echo $url; ?>&page=<?= $i; ?>"><?= $i; ?></a>
                  </li>
              <?php endfor; ?>

              <!-- Next Page Link -->
              <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?php echo $url; ?>&page=<?= $current_page + 1; ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
              <!-- Last Page Link -->
              <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="<?php echo $url; ?>&page=<?= $total_pages; ?>" aria-label="Last">
                      <span aria-hidden="true">&raquo;&raquo;</span>
                  </a>
              </li>
          </ul>
        </nav>

        <!-- pagination -->
      </section>
    </div>

    <script>
      function DeleteFormjs(productId) {
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?")) {
          document.getElementById('DeleteForm-' + productId).submit();
        }
      }


      function OpenModal() {
        const form = document.getElementById('editForm');
        form.style.display = form.style.display === 'block' ? 'none' : 'block';  // Toggle giữa hiển thị và ẩn
      }

      // Đóng modal
      function CloseModal() {
        document.getElementById('editForm').style.display = 'none';
      }
    </script>

<?php $this->view("./admin/Shared/footer"); ?>
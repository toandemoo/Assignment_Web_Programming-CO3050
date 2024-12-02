<?php $this->view("./admin/Shared/header"); ?>

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tất cả sản phẩm</h1>
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
                        <label for="productCategory" class="mr-2">Thể loại</label>
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
                        <label for="productQuantity">Số lượng</label>
                        <input type="text" class="form-control" id="productQuantity" placeholder="number" name="productQuantity">
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
                  <h3 class="card-title">Orders</h3>
                  <!-- <div class="dropdown float-right ml-4">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div> -->
                  <div class="card-tools">
                    <div class="input-group input-group-sm align-content-center" style="width: 150px;">
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
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Thể loại</th>
                        <th>Ngày tạo</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
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
                        <td>chua co</td>
                        <td><?=$row->pprice?></td>
                        <td><?=$row->pdescription?></td>
                        <td>
                          <button type="button" class="btn btn-info float-left col-sm-5 mr-1" onclick="OpenModal()" data-toggle="modal" data-target="#addProductModal">Chỉnh sửa</button>
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
                                  <form action="products/AddProduct" method="post" style="display: none;" id="editForm">
                                      <div class="form-group">
                                        <label for="productName">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="productName" placeholder="name" name="productName">
                                      </div>
                                      <div class="form-group">
                                        <label for="productCategory" class="mr-2">Thể loại</label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="productCategory">
                                          <option selected>Chọn</option>
                                          <option value="Quần">Quần</option>
                                          <option value="Áo">Áo</option>
                                          <option value="Mũ">Mũ</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="productSex" class="mr-2">Giới tính</label>
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
                                        <label for="productQuantity">Số lượng</label>
                                        <input type="text" class="form-control" id="productQuantity" placeholder="number" name="productQuantity">
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="CloseModal()">Hủy Bỏ</button>
                                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
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
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
              <!-- Previous Page Link -->
              <li class="page-item <?= ($current_page == 1) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?page=1" aria-label="First">
                      <span aria-hidden="true">&laquo;&laquo;</span>
                  </a>
              </li>
              <li class="page-item <?= ($current_page == 1) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?page=<?= $current_page - 1; ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>

              <!-- Page Number Links -->
              <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <li class="page-item <?= ($i == $current_page) ? 'active' : ''; ?>">
                      <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                  </li>
              <?php endfor; ?>

              <!-- Next Page Link -->
              <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?page=<?= $current_page + 1; ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
              <!-- Last Page Link -->
              <li class="page-item <?= ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?page=<?= $total_pages; ?>" aria-label="Last">
                      <span aria-hidden="true">&raquo;&raquo;</span>
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
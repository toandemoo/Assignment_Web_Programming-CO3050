<?php $this->view("./admin/Shared/header"); ?>

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Đánh Giá & Bình Luận</h1>
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
                        <th>Đánh Giá</th>
                        <tH>Bình Luận</tH>
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
                        <td class="col-1"><?=$row->id?></td>
												<td class="col-5">
													<span><img class="table-avatar rounded-2" style="width: 10%; height: 10%;" src="<?=$row->product_image?>" alt=""></span><?=$row->product_title?>
												</td>
                        <td class="col-1"><?=$row->average_rating?><i class="fa fa-star"></i></td>
                        <td class="col-2"><?=$row->total_comments?></td>
                        <td>
                          <button type="button" class="btn btn-info float-left col-sm-5 mr-1" onclick="window.location='<?= ROOT ?>Comments/detail/<?=$row->id?>';">Xem</button>
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


    <script>
      document.querySelector("form").addEventListener("submit", function (event) {
        const productName = document.getElementById("productName").value.trim();

        if (productName.length > 90) {
          alert("Tên sản phẩm không được vượt quá 90 ký tự.");
          event.preventDefault(); // Ngăn không cho form gửi đi
        }
      });
    </script>

<?php $this->view("./admin/Shared/footer"); ?>
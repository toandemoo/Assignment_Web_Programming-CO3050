<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <h2 class="mb-3">Sản Phẩm</h2>
        <div class="row">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon w-25"><img src="<?= $data['product']->pimg; ?>" /></span>
              <div class="info-box-content">
                <span class="info-box-text">Tên sản phẩm: <?= $data['product']->ptitle; ?></span>
                <span class="info-box-text">Giá: <?= $data['product']->pprice; ?></span>
                <span class="info-box-text">Loại: <?= $data['product']->pkind; ?></span>
                <span class="info-box-text">Giới tính: <?= $data['product']->pgender; ?></span>
                <span class="info-box-text">Mô tả: <?= $data['product']->pdescription; ?></span>
                <span class="info-box-text">Thời gian: <?= $data['product']->create_at; ?></span>
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
            <h1>Chi tiết sản phẩm</h1>
          </div>
          <button type="button" class="col-sm-2 ml-auto mr-5 btn btn-block btn-info" data-toggle="modal" data-target="#addProductModal">+ Thêm Size</button>
            <!-- Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Thêm Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Nội dung modal -->
                    <form action="<?= ROOT ?>detailProduct/addSize/<?= $data['product']->id;?>" method="post">
                      <div class="form-group">
                        <label for="productName">Size</label>
                        <input type="text" class="form-control" id="productName" placeholder="" name="size">
                      </div>
                      <div class="form-group">
                        <label for="productPrice">Số lượng</label>
                        <input type="text" class="form-control" id="productPrice" placeholder="" name="quantity">
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
                    <thead>
                      <th>STT</th>
                      <th>Size</th>
                      <th>Số lượng</th>
                      <th></th>
                    </thead>
                  </thead>
                  <tbody>
                    <?php $count = 1 ?>
                    <?php if (is_array($data['available'])): ?>
										<?php foreach ($data['available'] as $row): ?>
                    <tr>
										<div class="row">
											<a href="#">
                        <td><?=$count?></td>
                        <td><?=$row->size?></td>
                        <td><?=$row->quantity?></td>
                        <td class="col-3">
                          <button type="button" class="btn btn-info float-left col-sm-2 mr-1" onclick="OpenModal()" data-toggle="modal" data-target="#editProductModal">Sửa</button>
                          <!-- Modal -->
                          <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addProductModalLabel">Cập nhật</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?= ROOT ?>detailProduct/updateSize/<?= $data['product']->id;?>" method="post" style="display: none;" id="editForm">
                                      <div class="form-group">
                                        <label for="productName">Size</label>
                                        <input type="text" class="form-control" id="productName" placeholder="name" name="size" value="<?=$row->size?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="productPrice">Số lượng</label>
                                        <input type="text" class="form-control" id="productPrice" placeholder="vnđ" name="quantity" value="<?=$row->quantity?>">
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
                          <form action="<?= ROOT ?>detailProduct/deleteSize/<?= $data['product']->id;?>" method="post" id="DeleteForm-<?php echo $row->id; ?>">
                            <input type="text" value="<?=$row->id?>" name="idsize" hidden />
                            <button type="button" class="btn btn-danger col-sm-2" onclick="DeleteFormjs(<?php echo $row->id; ?>)">Xóa</button>
                          </form>
                        </td>
											</a>
										</div>
                    </tr>
										<!-- /product -->
                    <?php $count += 1 ?>
										<?php endforeach; ?>
										<?php else: ?>
										<tr>
                        <td colspan="4">
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
 
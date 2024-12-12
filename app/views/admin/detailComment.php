<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <h2 class="mb-3">Sản Phẩm</h2>
        <div class="row">
          <div class="col-12">
            <div class="info-box">
              <span class="info-box-icon"><img src="<?= $data['product']->pimg; ?>" /></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Sản Phẩm</b>: <?= $data['product']->ptitle; ?></span>
                <span class="info-box-text"><b>Loại Sản Phẩm</b>: <?=$data['product']->pkind; ?></span>
                <span class="info-box-text"><b>Ngày Tạo</b>: <?= $data['product']->create_at; ?></span>
                <span class="info-box-text"><b>Giá</b>: <?= $data['product']->pprice; ?></span>
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
            <h1>Chi Tiết Đánh Giá & Bình Luận</h1>
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
                      <th class="col-sm-1">ID</th>
                      <th class="col-sm-2">Họ Tên</th>
                      <th class="col-sm-1">Đánh Giá</th>
                      <th>Bình Luận</th>
                      <th>Thao Tác</th>
                    </thead>
                  </thead>
                  <tbody>
                    <?php $total = 0 ?>
                    <?php if (is_array($data['comment'])): ?>
                    <?php $count = 0; ?>
										<?php foreach ($data['comment'] as $row): ?>
                    <tr>
										<div class="row">
											<a href="#">
                        <td><?= $count?></td>
                        <td><?=$row->name?></td>
                        <td><?=$row->rating?><i class="fa fa-star"></i></td>
                        <td><?=$row->comment?></td>
                        <td>
                          <form action="<?= ROOT ?>Comments/delete/<?=$row->id?>" method="post" id="DeleteForm-<?php echo $row->id; ?>" >
                            <input type="text" value="<?php echo $row->id; ?>" name="productid" hidden />
                            <button type="button" class="btn btn-danger col-sm-5" onclick="DeleteFormjs(<?php echo $row->id; ?>)">Xóa</button>
                          </form>
                        </td>
											</a>
										</div>
                    </tr>
                    <?php $count++; ?>
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
        if (confirm("Bạn có chắc chắn muốn xóa đánh giá - bình luận này?")) {
          document.getElementById('DeleteForm-' + productId).submit();
        }
      }
  </script>

<?php $this->view("./admin/Shared/footer"); ?>

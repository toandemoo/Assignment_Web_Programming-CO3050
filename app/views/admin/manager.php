<?php $this->view("./admin/Shared/header"); ?>

   <!-- Main content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Quản Lý</h1>
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
                      <th>AdminID</th>
                      <th>Họ Tên</th>
                      <th>Vai Trò</th>
                      <th>Ngày Tạo</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (is_array($data['rows'])): ?>
						<?php foreach ($data['rows'] as $row): ?>
                    <tr>
						  <div class="row">
                        <td><?=$row->id?></td>
                        <td><?=$row->name?></td>
                        <td><?=$row->role?></td>
                        <td><?=$row->created_at?></td>
                        <td>
                           <button type="button" class="btn btn-info float-left col-sm-5 mr-1" onclick="OpenModal()" data-toggle="modal" data-target="#editAdmin">Chỉnh sửa</button>
                          <!-- Modal -->
                          <div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="addProductModalLabel">Chỉnh sửa thông tin</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form action="<?= ROOT ?>Account/updateAccount/<?php echo $row->id; ?>" method="post" style="display: none;" id="editForm">
                                      <div class="form-group">
                                        <label for="fullName" class="form-label">Họ tên</label>
								               <input type="text" class="form-control" id="fullName" name="fullName" value="<?=$row->name?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
								               <input type="email" class="form-control" id="email" name="email" value="<?=$row->email?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="password" class="form-label">Mật khẩu</label>
								               <input type="password" class="form-control" id="password" name="password" value="<?=$row->password?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="phoneNumber" class="form-label">Số điện thoại</label>
								               <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?=$row->phone?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="birth" class="form-label">Ngày sinh</label>
								               <input type="text" class="form-control" id="birth" name="birth" placeholder="01/01/2024" value="<?=$row->birthday?>" required>
                                      </div>
                                      <div class="form-group">
                                       <label for="gender">Giới tính:</label>
                                       <select id="gender" name="gender">
                                          <option value="male" <?= $row->gender === 'male' ? 'selected' : '' ?>>Nam</option>
                                          <option value="female" <?= $row->gender === 'fmale' ? 'selected' : '' ?>>Nữ</option>
                                          <option value="other" <?= $row->gender === 'other' ? 'selected' : '' ?>>Khác</option>
                                       </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="address" class="form-label">Địa chỉ</label>
								                <input type="text" class="form-control" id="address" name="address" value="none">
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
                           <form action="<?= ROOT ?>Account/DeleteAccount/<?php echo $row->id; ?>" id="DeleteForm-<?php echo $row->id; ?>">
                            <input type="text" value="<?php echo $row->id; ?>" hidden />
                            <button type="button" class="btn btn-danger col-sm-5" onclick="DeleteFormjs(<?php echo $row->id; ?>)">Xóa</button>
                          </form>
                        </td>
						  </div>
                    </tr>
						<!-- /product -->
						<?php endforeach; ?>
						<?php else: ?>
                     <tr>
                        <td colspan="4">
                           <p class="text-center">Không tìm thấy admin</p>
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

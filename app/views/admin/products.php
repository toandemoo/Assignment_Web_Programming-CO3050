<?php $this->view("./admin/Shared/header"); ?>

<body class="hold-transition sidebar-mini">
   <div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= ROOT ?>admin" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="<?= ROOT ?>infoAdmin" class="d-block">Alexander Pierce</a>
          </div>
          </div>

        <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                  <a href="<?= ROOT ?>admin" class="nav-link">
                     <i class="nav-icon fa fa-house-user"></i>
                     <p>Dashboard</p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>products" class="nav-link active">
                     <i class="nav-icon fa fa-shopping-cart"></i>
                     <p>
                        Products
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>orders" class="nav-link">
                     <i class="nav-icon fa fa-shopping-bag"></i>
                     <p>
                        Orders
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= ROOT ?>customers" class="nav-link">
                     <i class="nav-icon fa fa-user"></i>
                     <p>
                        Customers
                     </p>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Main content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>All Products</h1>
            </div>
            <button type="button" class="col-sm-2 ml-auto mr-5 btn btn-block btn-info" data-toggle="modal" data-target="#addProductModal">+ Add Product</button>
            <!-- Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- Nội dung modal -->
                    <form>
                      <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="name">
                      </div>
                      <div class="form-group">
                        <label for="productCategory" class="mr-2">Category</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected>Category</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="text" class="form-control" id="productPrice" placeholder="vnđ">
                      </div>
                      <div class="form-group">
                        <label for="productQuantity">Quantity</label>
                        <input type="text" class="form-control" id="productQuantity" placeholder="number">
                      </div>
                      <div class="form-group">
                        <label for="productImg">Img</label>
                        <input type="text" class="form-control" id="productImg" placeholder="URL">
                      </div>
                      <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" placeholder="Description"></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                  <div class="dropdown float-right ml-4">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown link
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </div>
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
                        <th>Product</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>183</td>
                        <td><span><img class="table-avatar rounded-2" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fdavies.vn%2Fao-thun-local-brand-dep-d26-t5&psig=AOvVaw1H7HxldSacW9a210FCYpK8&ust=1731806165704000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCKjSgOzW34kDFQAAAAAdAAAAABAE" alt="heefhef"></span>asf Pierce</td>
                        <td>John Doe</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-success">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td><button type="button" class="btn btn-info float-left col-sm-5 mr-1">Edit</button><button type="button" class="btn btn-danger col-sm-5">Delete</button></td>
                      </tr>
                      <tr>
                        <td>219</td>
                        <td><span><img class="table-avatar rounded-2" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fdavies.vn%2Fao-thun-local-brand-dep-d26-t5&psig=AOvVaw1H7HxldSacW9a210FCYpK8&ust=1731806165704000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCKjSgOzW34kDFQAAAAAdAAAAABAE" alt="heefhef"></span>asf Pierce</td>
                        <td>John Doe</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-warning">Pending</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td><button type="button" class="btn btn-info float-left col-sm-5 mr-1">Edit</button><button type="button" class="btn btn-danger col-sm-5">Delete</button></td>
                      </tr>
                      <tr>
                        <td>657</td>
                        <td><span><img class="table-avatar rounded-2" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fdavies.vn%2Fao-thun-local-brand-dep-d26-t5&psig=AOvVaw1H7HxldSacW9a210FCYpK8&ust=1731806165704000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCKjSgOzW34kDFQAAAAAdAAAAABAE" alt="heefhef"></span>asf Pierce</td>
                        <td>John Doe</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-primary">Approved</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td><button type="button" class="btn btn-info float-left col-sm-5 mr-1">Edit</button><button type="button" class="btn btn-danger col-sm-5">Delete</button></td>
                      </tr>
                      <tr>
                        <td>175</td>
                        <td><span><img class="table-avatar rounded-2" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fdavies.vn%2Fao-thun-local-brand-dep-d26-t5&psig=AOvVaw1H7HxldSacW9a210FCYpK8&ust=1731806165704000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCKjSgOzW34kDFQAAAAAdAAAAABAE" alt="heefhef"></span>asf Pierce</td>
                        <td>John Doe</td>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="tag tag-danger">Denied</span></td>
                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        <td><button type="button" class="btn btn-info float-left col-sm-5 mr-1">Edit</button><button type="button" class="btn btn-danger col-sm-5">Delete</button></td>
                      </tr>
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
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
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
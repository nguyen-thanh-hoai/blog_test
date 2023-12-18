<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">User</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <!-- enctype="multipart/form-data" -->
            <form action="registerprocess.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">User name</label>
                  <input type="text" name="email" class="form-control" id="email" required placeholder="Enter email" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required placeholder="Enter password" >
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">ADD</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
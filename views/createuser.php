<?php
session_start();
if (isset($_SESSION['email']) && $_SESSION['role'] == 0) { ?>
<?php
require '../models/user.php';
$user = new User();
?>
<!-- Primary Meta Tags -->
<title>Blog-Test</title>

<!-- Swipe CSS -->
<link type="text/css" href="../css/swipe.css" rel="stylesheet">

<style>
    body {
        font-family: Arial, sans-serif;
    }
</style>

<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-sm-6">
                        <h1>THÊM USER</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                            </div>
                            <form action="../process/createuserprocess.php" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">EMAIL</label>
                                        <input type="text" name="email" class="form-control" id="email" maxlength="100" required placeholder="Enter email">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="exampleInputEmail1">PASSWORD</label>
                                        <input type="password" name="password" class="form-control" id="password" minlength="6" maxlength="20" required placeholder="Enter password">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">ROLE</label>
                                        <select name="role" id= "role" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            <?php $getRole = $user->getRole();
                                            foreach ($getRole as $value) { ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['ten'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">THÊM</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<?php }
?>
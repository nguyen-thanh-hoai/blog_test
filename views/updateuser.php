<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
  </style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Blog-Test</title>

<!-- Swipe CSS -->
<link type="text/css" href="../css/swipe.css" rel="stylesheet">

<?php
require '../models/user.php';
if (isset($_GET['id'])) {
  $user = new User();
  $value = $user->getUserById($_GET['id']);
?>

  <body>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-sm-6">
              <h1>UPDATE USER</h1>
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
                <form action="../process/updateuserprocess.php" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="hidden" name="id" value="<?php echo $value[0]['id'] ?>">
                      <input value="<?php echo $value[0]['email'] ?>" type="text" name="email" class="form-control" id="email" maxlength="100" required placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="password" class="form-control" id="password" maxlength="20" placeholder="Enter Mật Khẩu">
                    </div>
                    <div class="form-group">
                      <label for="">ROLE</label>
                      <select name="role" id="role" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        <?php $getRole = $user->getRole();
                        foreach ($getRole as $valueRole) {
                          if ($value[0]['vitri'] == $valueRole['id']) { ?>
                          <option selected value="<?php echo $valueRole['id'] ?>"><?php echo $valueRole['ten'] ?></option>
                        <?php
                          }else{ ?>
                          <option value="<?php echo $valueRole['id'] ?>"><?php echo $valueRole['ten'] ?></option>
                         <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">UPDATE</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
<?php
}
?>